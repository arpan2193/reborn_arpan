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


class DallController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('vendor.edit-dall', compact('user'));
    }

    public function addproductview()
    {
        $user = Auth::user();
        $currencies = Currency::all();
        $categories = Category::where('status','=','1')->get();
        return view('vendor.addproduct', compact('user', 'currencies','categories'));
    }

    public function store(Request $request)
    {
        dd($request);
        $user = Auth::user();
        $package = $user->subscribes()->orderBy('id', 'desc')->first();
        $prods = $user->products()->orderBy('id', 'desc')->get()->count();

        // if(!$package){
        //     return response()->json(array('errors' => [ 0 => 'You don\'t have any subscription plan.']));
        // }

        if ($prods < $package->allowed_products || $package->allowed_products == 0) {

            //--- Validation Section
            $rules = [
                'photo'      => 'required|mimes:jpeg,jpg,png,svg',
                'file'       => 'mimes:zip'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }
            //--- Validation Section Ends

            //--- Logic Section
            $data = new Product;
            $sign = Currency::where('is_default', '=', 1)->first();
            $input = $request->all();
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
            $input['previous_price'] = ($input['previous_price'] / $sign->value);
            $input['user_id'] = Auth::user()->id;

            //length insert by unit
            


            // Save Data
            $data->fill($input)->save();

            // Set SLug

            $prod = Product::find($data->id);
            $prod->slug = Str::slug($data->name,'-').'-'.strtolower(Str::random(3).$data->id.Str::random(3));
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
    }
}
