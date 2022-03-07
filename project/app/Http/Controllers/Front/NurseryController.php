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
use Illuminate\Support\Facades\Auth;
use Validator;
use DateTime;


class NurseryController extends Controller
{
	public $amount = 4;
// nnn
	public function index(Request $request)
	{	 
		$nursery_search_val = $request->input('search');
	
		$datas = array();
		$datas = User::with('products')->Where('is_vendor','=',1)->orderBy('shop_name','asc')->take(10)->get();

		if(!empty($nursery_search_val)){
			$datas = User::with('products')->where('shop_name','like','%'.$nursery_search_val.'%')->Where('is_vendor','=',1)->get();
			// dd($datas);
		}

		$countries = DB::table('users')
		->join('countries', 'users.country_id', '=', 'countries.id')
		->where('users.is_vendor','=',1)
		->select('countries.*', DB::raw('count(*) as total_users'),)
		->groupBy('users.country_id')
		->get();
		return view('front.nursery', compact('datas', 'countries'));
	}

	public function searchbyalphabet($alp){
		// dd($alp);
		$datas= array();
		if(!empty($alp)){
			$datas = User::with('products')->where('shop_name','like',$alp.'%')->Where('is_vendor','=',1)->get();
		}
		$countries = DB::table('users')
		->join('countries', 'users.country_id', '=', 'countries.id')
		->where('users.is_vendor','=',1)
		->select('countries.*', DB::raw('count(*) as total_users'),)
		->groupBy('users.country_id')
		->get();
		$alp = $alp;
		return view('front.nursery', compact('datas', 'countries', 'alp'));
	}

	public function searchbycountry($id){
		$datas= array();
		if(!empty($id)){
			$datas = User::with('products')->where('country_id','=',$id)->Where('is_vendor','=',1)->get();
		}
		$countries = DB::table('users')
		->join('countries', 'users.country_id', '=', 'countries.id')
		->where('users.is_vendor','=',1)
		->select('countries.*', DB::raw('count(*) as total_users'),)
		->groupBy('users.country_id')
		->get();
		$countryname = DB::table('countries')->where('id','=',$id)->select('country_name')->first();
		return view('front.nursery', compact('datas', 'countries','countryname'));

	}

	public function details(Request $request, $id)
	{	
		$nurseries_count =  Product::with('user')->where('user_id',$id)->where('status','=',1)->orderBy('id','desc')->count();
		$follower_count = DB::table('vendor_followers')->where('vendor_id',$id)->count();
		$nurseries_product =  Product::with('user')		
		->where('user_id',$id)
		->where('status','=',1)
		->orderBy('id','desc')
		->take(4)		
		->get();
		$vendor_details = User::with('products')->Where('is_vendor','=',1)->where('id','=',$id)->first();		
		$datetime1 = new DateTime($vendor_details->created_at);
		$datetime2 = new DateTime();		
		$difference = $datetime1->diff($datetime2);
		$onreborn = $difference->y.'.'.$difference->m;					
		return view('front.nursery-details', compact('nurseries_product','nurseries_count','vendor_details','onreborn','follower_count'));
		}
// user_id, vendor_id,user_country,user_email
	public function follow(Request $request)
	{	
		if(Auth::user())

	{ 
		$get_vendor = DB::table('users')->where('id', Auth::id())->where('is_vendor', 1)->get();
		
		if(count($get_vendor)>0){
			return response()->json('<span style="color:red">You are artist!</span>');
		}else {
			$followed = DB::table('vendor_followers')
			->where('user_id', Auth::id())
			->where('vendor_id', $request->input('v_id'))
			->get();
			if(count($followed)>0){
				// unfollow condiction apply
				return response()->json("You have already followed!");
			}
			else{
				$vendor_country = DB::table('users')
				->join('countries', 'users.country_id', '=', 'countries.id')
				->where('users.id','=',$request->input('v_id'))
				->select('countries.country_name')
				->first();
				$user_country = DB::table('users')
				->join('countries', 'users.country_id', '=', 'countries.id')
				->where('users.id','=',Auth::id())
				->select('countries.country_name')
				->first();
				DB::table('vendor_followers')->insert(['user_id' => Auth::id(),
				'vendor_id' => $request->input('v_id'),
				'user_id' => Auth::id(),
				'vendor_country' => $vendor_country->country_name,
				'user_country' => $user_country->country_name]);
				return response()->json('follow successfully!');
			}
			}

			} else{
			return response()->json('<span style="color:red">First signin then follow!</span>');
		}	
	}

}
