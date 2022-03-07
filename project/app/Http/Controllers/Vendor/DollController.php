<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Currency;
use App\Models\Gallery;
use App\Models\Generalsetting;
use App\Models\Subcategory;
use App\Models\VendorOrder;
use App\Models\Verification;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

use Image;
use Session;
use Validator;


class DollController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $products = Product::where("user_id","=",$user->id)->orderBy('prod_order','asc')->get();
        // dd($products);
        return view('vendor.edit-dall', compact('user','products'));
    }

    //edit form appears with this function
    public function editprodform($prodid){
        $user = Auth::user();
        $product = Product::findOrFail($prodid);
        $weighting =  json_decode($product->weighting);
        $torso =  json_decode($product->torso);
        $shipping_charges = json_decode($product->shipping_charges);
        $gallery = Gallery::where('product_id','=',$prodid)->get();
        //  dd($shipping_charges);
        // $shipping_cost_arr = array();
        // for($i=0;$i<count($shipping_charges);$i++){
        //     foreach($shipping_charges[$i] as $key => $charges){
        //         if($shipping_charges[$i]==$key){
        //             echo $key."-".$charges."<br>";
        //         }else{
        //             continue;
        //         }
                
        //     }
        // }
        return view('vendor.edit-doll-form',compact('user','product','weighting','torso','gallery','shipping_charges'));
    }

    //add product form appears with this function
    public function addproductview()
    {
        $user = Auth::user();
        $currencies = Currency::all();
        $categories = Category::where('status','=','1')->get();
        return view('vendor.addproduct', compact('user', 'currencies','categories'));
    }
    //end of the function of add product form

    //New product data stores through this function
    public function store($pid=0,Request $request)
    {
        // dd($request);
        $user = Auth::user();
        $package = $user->subscribes()->orderBy('id', 'desc')->first();
        // $prods = $user->products()->orderBy('id', 'desc')->get();
        $prods = $user->products()->orderBy('id', 'asc')->get();
        // dd($prods);
        
        // if(!$package){
        //     return response()->json(array('errors' => [ 0 => 'You don\'t have any subscription plan.']));
        // }

        // if ($prods < $package->allowed_products || $package->allowed_products == 0) {
        if($pid == 0 || empty($pid))
        {
            if (!empty($request)) {
                $data = new Product;

                //----Other product's order increasing by 1
                if(!empty($prods)){
                    foreach($prods as $prod){
                        $new_order['prod_order'] = $prod->prod_order + 1;
                        $data->where('id','=',$prod->id)->update($new_order);
                        // dd($prod->id);
                    }
                }
                //---- END ----
                //--- Validation Section
                $rules = [
                    'photo'      => 'required|mimes:jpeg,jpg,png,svg',
                    'name'       => 'required',
                    
                ];

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
                }
                //--- Validation Section Ends

                $input = $request->all();
                // --- weighting section start
                $input['weighting'] = json_encode($request->weighting);

                //--- weighting Section end
                $input['torso'] = json_encode($request->torso);

                //--- order section starts
                $input['prod_order'] = $request->prod_order;
                //--- order section ends
                //--- Logic Section
                $sign = Currency::where('is_default', '=', 1)->first();
                // Check File
                if ($file = $request->file('file')) {
                    $name = time() . str_replace(' ', '', $file->getClientOriginalName());
                    $file->move('assets/files', $name);
                    $input['file'] = $name;
                }

                if ($file = $request->file('photo')) {
                    $name = time() . str_replace(' ', '', $file->getClientOriginalName());
                    $file->move('assets/images/products', $name);
                    $input['photo'] = $name;
                }

                // Conert Price According to Currency
                $input['price'] = ($input['price'] / $sign->value);
                // $input['previous_price'] = ($input['previous_price'] / $sign->value);
                $input['user_id'] = Auth::user()->id;

                // Shipping charges section
                $c_charges = array();
                if (count($request->shipping_charges) > 0) {
                
                    foreach ($request->shipping_charges as $charges) {
                        $count = 0;
                        if(count($charges) > 0){
                            foreach($charges as $charge){
                                $c_charges[$count][]  = $charge;
                                $count++;
                            }
                        }
                    }
                }
                // dd($c_charges);
                $charges = json_encode($c_charges);
                //dd($charges);
                $input['shipping_charges'] = $charges;
                
                // shipping charges section end

                // Save Data
                $data->fill($input)->save();

                // Set SLug

                $prod = Product::find($data->id);
                // dd($prod);
                $prod->slug = Str::slug($data->name,'-').'-'.strtolower(Str::random(3).$data->id.Str::random(3));
                // dd($prod->slug);
                // dd($prod->slug);
                // if($prod->type != 'Physical'){
                //     $prod->slug = Str::slug($data->name,'-').'-'.strtolower(Str::random(3).$data->id.Str::random(3));
                // }
                // else {
                //     $prod->slug = Str::slug($data->name,'-').'-'.strtolower($data->sku);
                // }
                
                
                // Set Photo
                $resizedImage = Image::make(public_path() . '/assets/images/products/' . $prod->photo)->resize(800, null, function ($c) {
                    $c->aspectRatio();
                });
                $photo = Str::random(12) . '.jpg';
                $resizedImage->save(public_path() . '/assets/images/products/' . $photo);


                // Set Thumbnail
                $background = Image::canvas(300, 300);
                $resizedImage = Image::make(public_path() . '/assets/images/products/' . $prod->photo)->resize(300, 300, function ($c) {
                    $c->aspectRatio();
                    $c->upsize();
                });
                // insert resized image centered into background
                $background->insert($resizedImage, 'center');
                // save or do whatever you like
                $thumbnail = Str::random(12) . '.jpg';
                $background->save(public_path() . '/assets/images/thumbnails/' . $thumbnail);


                $prod->thumbnail  = $thumbnail;
                $prod->photo  = $photo;
                $prod->update();

                // Add To Gallery If any
                $lastid = $data->id;
                if ($files = $request->file('gallery')) {
                    foreach ($files as  $key => $file) {
                        if (in_array($key, $request->galval)) {
                            $gallery = new Gallery;
                            $name = time() . str_replace(' ', '', $file->getClientOriginalName());
                            $img = Image::make($file->getRealPath())->resize(800, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $thumbnail = Str::random(12) . '.jpg';
                            $img->save(public_path() . '/assets/images/galleries/' . $name);
                            $gallery['photo'] = $name;
                            $gallery['product_id'] = $lastid;
                            $gallery->save();
                        }
                    }
                }
                //logic Section Ends

                //--- Redirect Section
                // $msg = 'New Product Added Successfully.<a href="' . route('vendor-prod-index') . '">View Product Lists.</a>';
                return response()->json(1);
                //--- Redirect Section Ends
            } else {
                //--- Redirect Section
                return response()->json(array('errors' => [0 => 'You Can\'t Add More Product.']));

                //--- Redirect Section Ends
            }
        }else{
            // dd(1);
            if (!empty($request)) {
                $prod = Product::find($pid);
                //--- Validation Section
                $rules = [
                    'name'       => 'required',
                ];
                // if(!empty($request->prev_photo)){
                //     $rules['photo']     = 'required|mimes:jpeg,jpg,png,svg';
                // }

                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
                }
                //--- Validation Section Ends

                $input = $request->all();
                // $input['id'] = $pid;
                // --- weighting section start
                $input['weighting'] = json_encode($request->weighting);

                //--- weighting Section end
                $input['torso'] = json_encode($request->torso);

                //--- order section starts
                $input['prod_order'] = $request->prod_order;
                //--- order section ends
                //--- Logic Section
                $sign = Currency::where('is_default', '=', 1)->first();
                // Check File
                if ($file = $request->file('file')) {
                    $name = time() . str_replace(' ', '', $file->getClientOriginalName());
                    $file->move('assets/files', $name);
                    $input['file'] = $name;
                }

                if ($file = $request->file('photo')) {
                    $name = time() . str_replace(' ', '', $file->getClientOriginalName());
                    $file->move('assets/images/products', $name);
                    $input['photo'] = $name;
                }

                // Conert Price According to Currency
                $input['price'] = ($input['price'] / $sign->value);
                // $input['previous_price'] = ($input['previous_price'] / $sign->value);
                $input['user_id'] = Auth::user()->id;

                // Shipping charges section
                $c_charges = array();
                if (count($request->shipping_charges) > 0) {
                
                    foreach ($request->shipping_charges as $charges) {
                        $count = 0;
                        if(count($charges) > 0){
                            foreach($charges as $charge){
                                $c_charges[$count][]  = $charge;
                                $count++;
                            }
                        }
                    }
                }
                // dd($c_charges);
                $charges = json_encode($c_charges);
                //dd($charges);
                $input['shipping_charges'] = $charges;
                
                // shipping charges section end
                // unset($input['_token']);
                // $input['id'] = $pid;
                
                // Save Data
                $prod->update($input);

                // Set SLug

                // $prod = Product::find($pid);
                // dd($prod);
                $prod->slug = Str::slug($prod->name,'-').'-'.strtolower(Str::random(3).$prod->id.Str::random(3));
                
                // Set Photo
                if(!empty($request->photo))
                {    $resizedImage = Image::make(public_path() . '/assets/images/products/' . $prod->photo)->resize(800, null, function ($c) {
                        $c->aspectRatio();
                    });
                    $photo = Str::random(12) . '.jpg';
                    $resizedImage->save(public_path() . '/assets/images/products/' . $photo);


                    // Set Thumbnail
                    $background = Image::canvas(300, 300);
                    $resizedImage = Image::make(public_path() . '/assets/images/products/' . $prod->photo)->resize(300, 300, function ($c) {
                        $c->aspectRatio();
                        $c->upsize();
                    });
                    // insert resized image centered into background
                    $background->insert($resizedImage, 'center');
                    // save or do whatever you like
                    $thumbnail = Str::random(12) . '.jpg';
                    $background->save(public_path() . '/assets/images/thumbnails/' . $thumbnail);
                }else{
                    $photo = $request->prev_photo;
                    $thumbnail = $request->prev_thumbnail;
                }


                $prod->thumbnail  = $thumbnail;
                $prod->photo  = $photo;
                $prod->update();

                // Add To Gallery If any
                if ($files = $request->file('gallery')) {
                    foreach ($files as  $key => $file) {
                        if (in_array($key, $request->galval)) {
                            $gallery = new Gallery;
                            $name = time() . str_replace(' ', '', $file->getClientOriginalName());
                            $img = Image::make($file->getRealPath())->resize(800, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $thumbnail = Str::random(12) . '.jpg';
                            $img->save(public_path() . '/assets/images/galleries/' . $name);
                            $gallery['photo'] = $name;
                            $gallery['product_id'] = $pid;
                            $gallery->save();
                        }
                    }
                }
                //logic Section Ends

                //--- Redirect Section
                // $msg = 'New Product Added Successfully.<a href="' . route('vendor-prod-index') . '">View Product Lists.</a>';
                return response()->json(2);
                //--- Redirect Section Ends
            } else {
                //--- Redirect Section
                return response()->json(array('errors' => [0 => 'You Can\'t Add More Product.']));

                //--- Redirect Section Ends
            }
        }
    }

    // product update from vendor
    public function update(Request $request){
        
    }

    //---- CHANGE THE ORDER OF THE PRODUCTS ----
    public function changeorder(Request $request) {
        // dd($request);
        $user = Auth::user();
        $cond = [
            'prod_order' => $request->newVal,
            'user_id' => $user->id,
        ];
        $prod_exist = Product::where($cond)->get();
        $products = new Product;
        
        // dd($prod_exist[0]->id);

        // --- CODE TO SWAP THE ORDER ---
        // if(!empty($prod_exist)){
        //     $prod_new_order = Product::findOrFail($prod_exist[0]->id);
        //     $prod_prev_order = Product::findOrFail($request->prodid);
        //     $prod_new_order->update(['prod_order' => $request->prevVal]);
        //     $prod_prev_order->update(['prod_order' => $request->newVal]);
        //     return response()->json(1);
        // }else{
        //     return response()->json(0);
        // }
        // --- CODE TO SWAP THE ORDER ---
        
        
        // --- CODE FOR REARRANGE THE ORDER ---
        foreach ($prod_exist as $prod){    
            if(!empty($prod)){
                if($request->newVal > $request->prevVal){
                    $diff = $request->newVal - $request->prevVal;
                    $middle_order_prods = Product::where('prod_order','>',$request->prevVal)->where('prod_order','<=',$request->newVal)->where('user_id','=',$user->id)->get();
                    // dd($middle_order_prods);
                    $products->where('prod_order','=',$request->prevVal)->where('user_id','=',$user->id)->update(['prod_order'=>$request->newVal]);
                    for($i=0;$i<$diff;$i++){
                        // print_r($middle_order_prods[$i]->prod_order);
                        $new_order['prod_order'] = $middle_order_prods[$i]->prod_order - 1;
                        $products->where('id','=',$middle_order_prods[$i]->id)->update($new_order);
                    }
                    return response()->json(1);
                }else{
                    $diff = $request->prevVal - $request->newVal;
                    $middle_order_prods = Product::where('prod_order','>=',$request->newVal)->where('prod_order','<',$request->prevVal)->where('user_id','=',$user->id)->get();
                    $products->where('prod_order','=',$request->prevVal)->where('user_id','=',$user->id)->update(['prod_order'=>$request->newVal]);
                    // dd($middle_order_prods);
                    for($i=0;$i<$diff;$i++){
                        // print_r($middle_order_prods[$i]->prod_order);
                        $new_order['prod_order'] = $middle_order_prods[$i]->prod_order + 1;
                        // dd($new_order);
                        $products->where('id','=',$middle_order_prods[$i]->id)->update($new_order);
                    }
                    return response()->json(1);
                }
            }else{
                return response()->json(0);
            }
        }
        // --- CODE FOR REARRANGE THE ORDER ---
    }

    public function deleteimg(Request $request){
        // dd($request);
        if($request->id){
            if($request->type == "g"){
                Gallery::where("id","=",$request->id)->delete();
                return response()->json(1);
            }else{

                Product::where("id","=",$request->id)->update(["photo" => "","thumbnail" => ""]);
                return response()->json(1);
            }
        }
    }
}
