<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Generalsetting;
use App\Models\Subcategory;
use App\Models\Country;
use App\Models\VendorOrder;
use App\Models\Verification;
use App\Models\VendorFollower;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Redirect;
use Illuminate\Http\Request;
// use DB;
use Session;
use Validator;


class VendorController extends Controller
{
    public function index()
    {
        $user = Auth::user();   
        $forums = DB::table('vendor_forums')
		->join('users', 'vendor_forums.user_id', '=', 'users.id')
		->where('vendor_forums.pid','=',0)
        ->where('users.is_vendor','=',1)
		->select('vendor_forums.*', 'users.name', 'users.photo', 'users.id AS userid')
        ->orderBy('id', 'DESC')
		->get();
        if(count($forums)>0){
            for($i=0;$i<count($forums); $i++){
                $child_forums = DB::table('vendor_forums')
                ->join('users', 'vendor_forums.user_id', '=', 'users.id')
                ->where('users.is_vendor','=',1)
                ->where('vendor_forums.pid','=',$forums[$i]->id)
                ->select('vendor_forums.*', 'users.name', 'users.photo', 'users.id as userid')
                ->get();

                $forums[$i]->comments=$child_forums;
                

            }
        }
        return view('vendor.dashboard',compact('user','forums'));
    }
    public function createNewforum()
    {
        $user = Auth::user();
        return view('vendor.createforum',compact('user'));
    }

    public function storeNewforum(Request $request){
        $user = Auth::user();
        $blog=$request->input('forum');
        $data=array('user_id'=>auth()->id(),"pid"=>0,"blog"=>$blog,"likes"=>0);
        DB::table('vendor_forums')->insert($data);
        return redirect()->route('vendor-dashboard');
    }

    public function storeNewReplyforum(Request $request){
        $user = Auth::user();
        $blog=$request->input('forum');
        $pid=$request->input('pid');
        $data=array('user_id'=>auth()->id(),"pid"=>$pid,"blog"=>$blog,"likes"=>0);
        DB::table('vendor_forums')->insert($data);
        return redirect()->route('vendor-dashboard');
    }

    public function followers(){
        $user = Auth::user();
        if(Auth::user())
        {
        $ifollow_user = DB::table('vendor_followers')
        ->join('users', 'users.id', '=', 'vendor_followers.user_id')
        ->select('users.*','vendor_followers.*')
        ->where('vendor_followers.vendor_id',$user->id)
        ->where('users.is_vendor','0')
        ->orderBy('vendor_followers.id','DESC')->get();
        $ifollow_count = DB::table('vendor_followers')
        ->join('users', 'users.id', '=', 'vendor_followers.user_id')
        ->select('users.*','vendor_followers.*')
        ->where('vendor_followers.vendor_id',$user->id)
        ->where('users.is_vendor','0')
        ->orderBy('vendor_followers.id','DESC')->count();

        $email_subscribers = DB::table('vendor_followers')
        ->join('users', 'users.id', '=', 'vendor_followers.user_id')
        ->select('users.*','vendor_followers.*')
        ->where('vendor_followers.vendor_id',$user->id)
        ->where('users.is_vendor','0')
        ->where('vendor_followers.email_subscriber','1')
        ->orderBy('vendor_followers.id','DESC')->count();
        return view('vendor.followers',compact('user','ifollow_user','ifollow_count','email_subscribers'));
        }
    }

    public function blockfollow(Request $request) {

        if(Auth::user())
        {  
            $block = DB::table('vendor_followers')
            ->where('vendor_id', Auth::id())
            ->where('user_id', $request->input('user_id'))
            ->update(array('email_subscriber' => 0)); 
            if($block){
                return response()->json('Block Successfully!');
            }          
        
        }
   }

    public function review(){
        $user = Auth::user();   
        return view('vendor.review',compact('user'));
    }

    public function myaccount(){
        
        $user = Auth::user();  
        $countries = Country::all();        
        return view('vendor.myaccount',compact('user','countries'));
    }

     public function vendorupdate(Request $request) {
    
     $input = $request->all();
    //  dd($input);
    $data = Auth::user();
    $input['name'] = $request->name;
    $input['shop_name'] = $request->shop_name;
    $input['city'] = $request->city;
    $input['state'] =   $request->state;
    $input['country_id'] = $request->country_id;
    $input['password'] = $request->password;
    $input['reborn_url'] = $request->reborn_url;
    $input['website_url'] = $request->website_url;
    $input['f_url'] = $request->f_url;
    $input['l_url'] = $request->l_url;
    $input['t_url'] = $request->t_url;
    $input['p_url'] = $request->p_url;
    // $input['paypal'] = $request->paypal;
    // $input['venmo'] = $request->venmo;
    // $input['square'] = $request->square;
    // $input['check'] = $request->check;
    // $input['certified_funds'] = $request->certified_funds;
    // $input['money_order'] = $request->money_order;
    // $input['cash'] = $request->cash;
    // $input['bank_transfer'] = $request->bank_transfer;
    // $input['custompayment1'] = $request->custompayment1;
    // $input['custompayment2'] = $request->custompayment2;
    // $input['custompayment3'] = $request->custompayment3;
    // $input['paypal_address'] = $request->paypal_address;
    // $input['order_thank_you_message'] = $request->order_thank_you_message;
    // $input['order_location'] = $request->order_location;
    // $input['allow_contacts'] = $request->allow_contacts;
    // $input['member_description'] = $request->member_description;
    // $input['layaway_state'] = $request->layaway_state;
    // $input['layaway_policy'] = $request->layaway_policy;
    // $input['return_refund_policy'] = $request->return_refund_policy;
    // $input['general_ordering_information'] = $request->general_ordering_information;

    
    if ($request->login_password) {

        $input['password'] = Hash::make($request->login_password);
    }
     $data->update($input);
     $msg = 'Successfully updated your profile';

            return Redirect::back()->with('status', 'Your profile has been Successfully updated');

     }

    

    


    public function faq(){
        $user = Auth::user();   
        return view('vendor.faq',compact('user'));
    }
}
