<?php

namespace App\Http\Controllers\front;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Socialsetting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __construct()
	{
	}

    /**
     * @developer: Neha kumari
     * Date:23/12/21
     * Description: Get Product Categorys 
     */
    public function productcategory($slug)
    {            
         $data =  DB::table('categories')->where('slug', $slug)->first();
         if ($data != null) {
            $category_id =  $data->id;
             $category_count =  Product::with('user','category')->where('category_id', $category_id)->where('user_id','!=',0)->where('status','=',1)->orderBy('id','desc')->count();

            $list =  Product::with('user','category')
            ->where('category_id', $category_id)
            ->where('user_id','!=',0)
            ->where('status','=',1)
            ->orderBy('id','desc')
            ->take(8)->get();
        }
		if ($data == null) {
			$data =  DB::table('custom_pages')->where('slug', $slug)->first();
		}
		if (empty($data)) {
			return response()->view('errors.404')->setStatusCode(404);
		}
		return view('front.productcategory', compact('data','list','category_count'));
    }
    /**
     * @developer: Neha kumari
     * Date:23/12/21
     * Description: Get Product  Details
     */
    public function productdetails($slug) {

         $products_dtls =  DB::table('products')->where('slug', $slug)->first(); 
         if ($products_dtls == null) {
			$products_dtls =  DB::table('custom_pages')->where('slug', $slug)->first();
		}
		if (empty($products_dtls)) {
			return response()->view('errors.404')->setStatusCode(404);
		}
        $productid = $products_dtls->id;
        $gallery_img = DB::table('galleries')
         ->join('products', 'products.id', '=', 'galleries.product_id')
         ->select('galleries.*','products.id')
         ->where('galleries.product_id', $productid)
         ->orderBy('galleries.id','desc')
         ->get();
         $vendor_id = $products_dtls->user_id;
         $user =  DB::table('users')->where('id', $vendor_id)->first(); 
         $vendor_img =  Product::with('user')->where('user_id','=',$vendor_id)->where('status','=',1)->orderBy('id','desc')->get();
		return view('front.productdetails', compact('products_dtls','gallery_img','vendor_img','user'));

    }

    /**
     * @developer: Neha kumari
     * Date:29/12/21
     * Description: Get Product featured List
     */
    public function productfeatured() {
        $featured_count =  Product::with('user')->where('featured','=',1)->where('user_id','!=',0)->where('status','=',1)->orderBy('id','desc')->count();
        $featured =  Product::with('user')->where('featured','=',1)->where('user_id','!=',0)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
       return view('front.productfeatured', compact('featured', 'featured_count'));
   }

   public function allitems(Request $request){
    if(count($request->input())>0){
        session()->forget('filters');
        $cat = $request->input('cat') ? $request->input('cat') : array();        	
        $sort = $request->input('sort_by');
        $price_range = $request->input('price_range'); 
        $filter_arr = array('cats'=>$cat, 'sort'=>$sort, 'price_range'=>$price_range);       
        Session::put('filters', $filter_arr);
        if($price_range >= "500") {
        $dalls = Product::with('user')
        ->where('user_id','!=',0)
        ->where('status','=',1)
        ->whereIn('category_id',$cat)
        ->orderBy('id',$request->input('sort_by') ? $request->input('sort_by') : "desc")
        ->where('price', '>=' ,$price_range)
        ->take(16)->get(); 
    }else{
        if ($price_range == null) {
            $dalls = Product::with('user')
            ->where('user_id','!=',0)
            ->where('status','=',1)
            ->whereIn('category_id',$cat)
            ->orderBy('id',$request->input('sort_by') ? $request->input('sort_by') : "desc")
            ->take(16)->get(); 

        }else {
        $dalls = Product::with('user')
        ->where('user_id','!=',0)
        ->where('status','=',1)
        ->whereIn('category_id',$cat)
        ->orderBy('id',$request->input('sort_by') ? $request->input('sort_by') : "desc")
        ->where('price', '<=', $price_range)
        ->take(16)->get(); 
        }       
    }
    }else{
        $dalls = Product::with('user')
        ->where('user_id','!=',0)
        ->where('status','=',1)
        ->orderBy('id','desc')
        ->take(16)->get(); 
    }
    $ids = array();
    return view('front.allitems', compact('dalls'));
   }

}
