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
use App\Models\Category;
use App\Models\Slider;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\Gallery;
use App\Models\FavoriteItem;
use App\Models\Custom_page;
use App\Models\Socialsetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use InvalidArgumentException;
use Markury\MarkuryPost;
use Validator;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
	public function __construct()
    {
        
    }


	// -------- HOME PAGE SECTION -------------------------
	public function index(Request $request)
	{	
		 
		$prod_category  = array();	
		$sliders = Slider::all();
		$data = Socialsetting::findOrFail(1);
		$prod_category =  DB::table('products')->get(); 
		$services = DB::table('services')->where('user_id','=',0)->get();
        $selectable = ['id','user_id','name','slug','photo','price','size'];
		$adoption_doll =  Product::with('user')->where('category_id','=',6)->where('user_id','!=',0)->where('status','=',1)->orderBy('id','desc')->take(4)->get();
		$reborn_doll =  Product::with('user')->where('featured','=',1)->where('user_id','!=',0)->where('status','=',1)->orderBy('id','desc')->take(4)->get();		
		$just_listed = Product::with('user')->where('user_id','!=',0)->where('status','=',1)->orderBy('id','desc')->take(8)->get();
		$alternative_doll =  Product::with('user')->where('category_id','=',4)->where('user_id','!=',0)->where('status','=',1)->orderBy('id','desc')->take(6)->get();
		$nurseries =  User::with('products')->where('is_vendor','=',1)->orderBy('id','desc')->get();	
        // dd($adoption_doll);
	return view('front.index', compact('sliders','data','prod_category','adoption_doll','reborn_doll','just_listed', 'alternative_doll', 'nurseries'));
	}


	// -------------------------------- FAQ SECTION ----------------------------------------
	public function faq()
	{
		$this->code_image();
		if(DB::table('generalsettings')->find(1)->is_faq == 0){
			return redirect()->back();
		}
		$faqs =  DB::table('faqs')->orderBy('id','desc')->get();
		return view('front.faq',compact('faqs'));
	}



	/**
	 * @developer: Neha thakur ->@modifide
	 * Date: 27/12/2021
	 * Description:Contact us page.
	 */
	public function contact()
	{
		//$this->code_image();
		if(DB::table('generalsettings')->find(1)->is_contact== 0){
			return redirect()->back();
		}
		$ps =  DB::table('pagesettings')->where('id','=',1)->first();
		return view('front.contact',compact('ps'));
	}

/**
	 * @developer: Neha thakur ->@created
	 * Date: 27/12/2021
	 * Description: About us page.
	 */
	public function about() 
	{
		
		$data =  DB::table('custom_pages')->where('slug', 'about')->first();
		
		if (empty($data)) {
			return response()->view('errors.404')->setStatusCode(404);
		}
		 return view('front.about',compact('data'));
	}




	// -------------------------------- PAGE SECTION ----------------------------------------
	public function page($slug)
	{
		$page =  DB::table('pages')->where('slug', $slug)->first();
		return view('front.page', compact('page'));
	}

	/**
	 * @developer: Neha thakur ->@created
	 * Date: 27/12/2021
	 * Description: Suscribe email submit.
	 */
	public function subscribe(Request $request)
	{
		if ($request->email == null) {
			return response()->json(array('blankerror' => 'Please Insert your Email id'));
		}       
		$subs = Subscriber::where('email', '=', $request->email)->first();
		if (isset($subs)) {
			return response()->json(array('error' => 'You have Already Subscribed.'));
		}
		$subscribe = new Subscriber;
		$subscribe->fill($request->all());
		$subscribe->save();
		//$msg = 'You Have Subscribed Successfully.';
        return response()->json(array('success' => 'You Have Subscribed Successfully.'));
	}

	// CURRENCY SECTION

	public function currency($id)
	{
		Session::put('currency', $id);
		cache()->forget('session_currency');
		return redirect()->back();
	}

	// CURRENCY SECTION ENDS

	// LANGUAGE SECTION

	public function language($id)
	{
		//dd($id);
		Session::put('language', $id);
		cache()->forget('session_language');
		return redirect()->back();
	}

/**
 * Name:Neha Kumari
 * Date:20/01/2021
 * Description: Add Fevret Product submit
 */

public function favorite(Request $request)
{
 	if(Auth::user())
	 {  
		$get_vendor = DB::table('users')->where('id', Auth::id())->where('is_vendor', 1)->get();
		if(count($get_vendor)>0){
			return response()->json('<span style="color:red">Error!</span>');
		}else{
			$added = DB::table('favorite_items')->where('product_id', $request->input('proid'))->where('user_id', Auth::id())->get();
			if(count($added)>0){
				return response()->json('Favorite already added!');
			}else{
				DB::table('favorite_items')->insert(['product_id' => $request->input('proid'), 'user_id' => Auth::id()]);
				return response()->json('Favorite added successfully');
			}
		}
		
	}else{
		return response()->json('<span style="color:red">First signin then add favorite product!</span>');
	}
	
}

/**
 * Name:Neha Kumari
 * Date:27/01/2021
 * Description: Recent View Products submit 
 */
public function Recentviews(Request $request)
{
	if(Auth::user())
	{  
	   $get_vendor = DB::table('users')->where('id', Auth::id())->where('is_vendor', 1)->get();
	   if(count($get_vendor)>0){
		   return response()->json('<span style="color:red">Error!</span>');
	   }else{
		   $adrecent_view = DB::table('recent_view_items')->where('product_id', $request->input('proid'))->where('user_id', Auth::id())->get();
		  
		   if(count($adrecent_view)>0){
			   return response()->json();
		   }else{
			   DB::table('recent_view_items')->insert(['product_id' => $request->input('proid'), 'user_id' => Auth::id()]);
			   return response()->json();
		   }
	   }
	   
   }else{
	   return response()->json();
   }	

}


	

}

