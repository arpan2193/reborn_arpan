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
            $list =  Product::with('user','category')
            ->where('category_id', $category_id)
            ->where('user_id','!=',0)
            ->where('status','=',1)
            ->orderBy('id','desc')
            ->take(4)->get();

            // $list = DB::table('categories')
            // ->join('products', 'categories.id', '=', 'products.category_id')
            // ->join('users', 'users.id', '=', 'products.user_id')
            // ->select('products.*','users.is_vendor')
            // ->where('products.category_id', $category_id)
            // ->where('products.user_id','!=',0)->where('products.status','=',1)->orderBy('id','desc')->take(4)->get()
            // ->reject(function($item){
            //     if($item->is_vendor != 2){
            //         return true;
            //     }			
            //     return false;
            // });
        }
		if ($data == null) {
			$data =  DB::table('custom_pages')->where('slug', $slug)->first();
		}
		if (empty($data)) {
			return response()->view('errors.404')->setStatusCode(404);
		}
		return view('front.productcategory', compact('data','list'));
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
         $vendor_img =  Product::with('user')->where('user_id','=',$vendor_id)->where('status','=',1)->orderBy('id','desc')->take(4)->get();
        //dd($vendor_img);
		return view('front.productdetails', compact('products_dtls','gallery_img','vendor_img'));

    }

    /**
     * @developer: Neha kumari
     * Date:29/12/21
     * Description: Get Product featured List
     */
    public function productfeatured() {
        $featured =  Product::with('user')->where('featured','=',1)->where('user_id','!=',0)->where('status','=',1)->orderBy('id','desc')->take(4)->get();
       return view('front.productfeatured', compact('featured'));
   }

   


}
