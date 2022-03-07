<?php

namespace App\Http\Controllers\Vendor;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Generalsetting;
use App\Models\Subcategory;
use App\Models\Country;
use App\Models\VendorOrder;
use App\Models\User;
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
    public function index(Request $request)
    {
        $search_forum = $request->input('search');
        $user = Auth::user();   
        $count_post =  DB::table('vendor_forums')
        ->where('vendor_forums.pid','=',0)
		->select('vendor_forums.*')
        ->count();   


        $forums = DB::table('vendor_forums')
		->join('users', 'vendor_forums.user_id', '=', 'users.id')
        ->join('countries', 'users.country_id', '=', 'countries.id')
		->where('vendor_forums.pid','=',0)
        ->where('users.is_vendor','=',1)
		->select('vendor_forums.*', 'users.name', 'users.photo', 'users.id AS userid','users.shop_name','countries.country_name')
        ->orderBy('id', 'DESC')
		->take(5)		
        ->get();
       
        if(count($forums)>0){
            for($i=0;$i<count($forums); $i++){
                $child_forums = DB::table('vendor_forums')
                ->join('users', 'vendor_forums.user_id', '=', 'users.id')
                ->join('countries', 'users.country_id', '=', 'countries.id')
                ->where('users.is_vendor','=',1)
                ->where('vendor_forums.pid','=',$forums[$i]->id)
                ->select('vendor_forums.*', 'users.name', 'users.photo', 'users.id as userid','users.shop_name','countries.country_name')	
                ->get();

                $forums[$i]->comments=$child_forums;               
            }
        }

            
        if(!empty($search_forum)){
            $forums = DB::table('vendor_forums')
            ->join('users', 'vendor_forums.user_id', '=', 'users.id')
            ->join('countries', 'users.country_id', '=', 'countries.id')
            ->where('vendor_forums.pid','=',0)
            ->where('users.is_vendor','=',1)
            ->where('name','like', "{$search_forum}%")
            ->select('vendor_forums.*', 'users.name', 'users.photo', 'users.id AS userid','users.shop_name','countries.country_name')
            ->orderBy('id', 'DESC')		
            ->get();
            
           
            if(count($forums)>0){
                for($i=0;$i<count($forums); $i++){
                    $child_forums = DB::table('vendor_forums')
                    ->join('users', 'vendor_forums.user_id', '=', 'users.id')
                    ->join('countries', 'users.country_id', '=', 'countries.id')
                    ->where('users.is_vendor','=',1)
                    ->where('vendor_forums.pid','=',$forums[$i]->id)
                    ->select('vendor_forums.*', 'users.name', 'users.photo', 'users.id as userid','users.shop_name','countries.country_name')		
		             ->get();
                    $forums[$i]->comments=$child_forums;             
                }
            }
        }
      
        return view('vendor.dashboard',compact('user','forums','count_post'));
    }

    public function bloglike(Request $request) {
        if(Auth::user())
        {            
        $pid = $request->input('post_id');            
        $countlike =  DB::table('vendor_forums')
        ->where('pid', $pid)->first()->likes;
           
         $likes = DB::table('vendor_forums')
        ->where('pid', $request->input('post_id'))
        ->update(array('likes' => $countlike+1)); 
            if($likes){
                return response()->json('like Successfully!');
            }        
        }

    }

    public function commentlike(Request $request) {
        if(Auth::user())
        {            
        $id = $request->input('comet_id');            
        $countlike =  DB::table('vendor_forums')
        ->where('id', $id)->first()->likes;
           
         $likes = DB::table('vendor_forums')
        ->where('id', $request->input('comet_id'))
        ->update(array('likes' => $countlike+1)); 
            if($likes){
                return response()->json('like Successfully!');
            }        
        }

    }

    // public function blogunlike(Request $request) {
    //     if(Auth::user())
    //     {            
    //     $ids = $request->input('post_id');            
    //     $countlike =  DB::table('vendor_forums')
    //     ->where('id', $ids)->first()->likes;
    //    $vl = $countlike-1;
       
    //      $likes = DB::table('vendor_forums')
    //      ->where('user_id', Auth::id())
    //     ->where('pid', $request->input('post_id'))
    //     ->update(array('likes' => $vl,'user_like' => 'no')); 
         
    //         if($likes){
    //             return response()->json('like Successfully!');
    //         }        
    //     }

    // }

   






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
        return redirect()->route('vendor-dashboard')->with('success','Post create successfully');
    }

    public function storeNewReplyforum(Request $request){
        $user = Auth::user();
        $blog=$request->input('forum');
        $pid=$request->input('pid');
        $data=array('user_id'=>auth()->id(),"pid"=>$pid,"blog"=>$blog,"likes"=>0);
        DB::table('vendor_forums')->insert($data);
        return redirect()->route('vendor-dashboard')->with('success','Post comment successfully');
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
        $payments_accepted = json_decode($user->payments_accepted);      
        return view('vendor.myaccount',compact('user','countries','payments_accepted'));
    }

     public function vendorupdate(Request $request) {
    
        $input = $request->all();
        //  dd($input);
        $user = Auth::user();
        $data = User::findOrFail($user->id);

        $rules = [
            'shop_name' => 'required',
            'shop_number'  => 'max:10'
        ];
        $customs = [
            'shop_name.unique' => 'This Shop Name has already been taken.',
            'shop_number.max'  => 'Shop Number Must Be Less Then 10 Digit.'
        ];

        $validator = Validator::make($request->all(), $rules, $customs);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $payment_mode_arr = array();
        foreach($request->payment_mode as $key => $val){
            $payment_mode_arr2 = array("$key" => "$val");
            $payment_mode_arr= array_merge($payment_mode_arr, $payment_mode_arr2);
        }
        // dd($payment_mode_arr);
        $input['payments_accepted'] = json_encode($payment_mode_arr);

        if($data->update($input)){
            return response()->json(1);
        }else{
            return response()->json(0);
        }
    }

    
    public function changeprofilephoto(){
        $user = Auth::user();  
        return view('vendor.changeprofilephoto',compact('user'));
    }
    


    public function faq(){
        $user = Auth::user();   
        return view('vendor.faq',compact('user'));
    }


    // changing password of vendor user
    public function changepass($id, Request $request){
        $user = Auth::user(); 
        $userdata = User::findOrFail($id);
        // dd($userdata);
        if(!empty($userdata)){
            $rules = [
                'password_confirmation' => 'same:password'
            ];
            $customs = [
                'password_confirmation.same' => 'The Confirm Password should be same as password.'
            ];
            $validator = Validator::make($request->all(), $rules, $customs);
            if ($validator->fails()) {
                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }

            $input['password'] = bcrypt($request->password);
            if($userdata->update($input)){
                return response()->json(1);
            }else{
                return response()->json(0);
            }
        }else{
            return response()->json(0);
        }
    }
    // public function searchforum(Request $request) {
    //     $search_forum = $request->input('search');
    //     if(!empty($search_forum)){
	// 	// 	$datas = User::with('products')->where('shop_name','like','%'.$nursery_search_val.'%')->Where('is_vendor','=',1)->get(); 
    //     $result_forum = DB::table('vendor_forums')
	// 	->join('users', 'vendor_forums.user_id', '=', 'users.id')
    //     ->join('countries', 'users.country_id', '=', 'countries.id')
	// 	->where('vendor_forums.pid','=',0)
    //     ->where('users.is_vendor','=',1)
    //     ->where('name','like', "{$search_forum}%")
	// 	->select('vendor_forums.*', 'users.name', 'users.photo', 'users.id AS userid','users.shop_name','countries.country_name')
    //     ->orderBy('id', 'DESC')
	// 	->get();
     
    //     if(count($result_forum)>0){
    //         for($i=0;$i<count($result_forum); $i++){
    //             $child_forums = DB::table('vendor_forums')
    //             ->join('users', 'vendor_forums.user_id', '=', 'users.id')
    //             ->join('countries', 'users.country_id', '=', 'countries.id')
    //             ->where('users.is_vendor','=',1)
    //             ->where('name','like', "{$search_forum}%")
    //             ->where('vendor_forums.pid','=',$result_forum[$i]->id)
    //             ->select('vendor_forums.*', 'users.name', 'users.photo', 'users.id as userid','users.shop_name','countries.country_name')
    //             ->get();

    //             $result_forum[$i]->comments=$child_forums;               
    //         }
    //     }
		
	// 	}

    //     return view('front.nursery');

    // }
}
