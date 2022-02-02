<?php

namespace App\Http\Controllers\Front;

use App\Classes\GeniusMailer;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Counter;
use App\Models\Generalsetting;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Custom_page;
use App\Models\Socialsetting;
use Carbon\Carbon;
use Cartalyst\Stripe\Api\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use InvalidArgumentException;
use Markury\MarkuryPost;
use Validator;

class NurseryController extends Controller
{
	public $amount = 4;

	public function index(Request $request)
	{	 
		$nursery_search_val = $request->input('search');
		// dd($nursery_search_val);
		$datas = array();
		$datas = User::with('products')->Where('is_vendor','=',1)->orderBy('shop_name','asc')->take(10)->get();

		if(!empty($nursery_search_val)){
			$datas = User::with('products')->where('shop_name','like','%'.$nursery_search_val.'%')->Where('is_vendor','=',1)->get();
			// dd($datas);
		}
		return view('front.nursery', compact('datas'));
	}

	public function searchbyalphabet($alp){
		// dd($alp);
		$datas= array();
		if(!empty($alp)){
			$datas = User::with('products')->where('shop_name','like',$alp.'%')->Where('is_vendor','=',1)->take(10)->get();
		}
		return view('front.nursery', compact('datas'));
	}

	public function details(Request $request, $id)
	{	
		
		$nurseries_product =  Product::with('user')		
		->where('user_id',$id)
		->where('status','=',1)
		->orderBy('id','desc')
		->paginate(4);		
		//->get();	
		return view('front.nursery-details', compact('nurseries_product'));
	}
	

}
