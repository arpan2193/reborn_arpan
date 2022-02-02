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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use InvalidArgumentException;
use Markury\MarkuryPost;
use Validator;

class SearchController extends Controller
{
	

	public function index(Request $request)
	{	 
		$search_val = $request->input('s');
		$data = array();
		//dd($search_val); 'like', "%{$categorie}%"
		$data =  Product::with('user')->where('name','like', "{$search_val}%")->where('user_id','!=',0)->where('status','=',1)->orderBy('id','desc')->take(6)->get();
       // dd($data);
		return view('front.search', compact('data','search_val'));
	}

}
