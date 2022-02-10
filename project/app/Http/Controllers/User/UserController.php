<?php

namespace App\Http\Controllers\User;

use App\Classes\GeniusMailer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Product; 
use App\Models\Gallery;
use App\Models\FavoriteItem;
use App\Models\Recentview;
use App\Models\VendorFollower;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Subscription;
use App\Models\Generalsetting;
use App\Models\UserSubscription;
use App\Models\FavoriteSeller;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
	 * @developer: Neha thakur ->@modifide
	 * Date: 27/12/2022
	 * Description:Show fevert product Dashboard.
	 */
    public function index()
    {
    $userid = Auth::user()->id;
    $fevrt_count = favoriteItem::with('Product','user')->where('user_id',$userid)->orderBy('id','desc')->count();
    $fevrt_list = favoriteItem::with('Product','user')
    ->where('user_id',$userid)
    ->orderBy('id','desc')
    ->take(6)    
    ->get();
    return view('user.dashboard', compact('fevrt_list','fevrt_count'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public function profileupdate(Request $request)
    {
        //--- Validation Section

        $rules =
            [
                'photo' => 'mimes:jpeg,jpg,png,svg',
                'email' => 'unique:users,email,' . Auth::user()->id
            ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends
        $input = $request->all();
        $data = Auth::user();
        if ($file = $request->file('photo')) {
            $name = time() . str_replace(' ', '', $file->getClientOriginalName());
            $file->move('assets/images/users/', $name);
            if ($data->photo != null) {
                if (file_exists(public_path() . '/assets/images/users/' . $data->photo)) {
                    unlink(public_path() . '/assets/images/users/' . $data->photo);
                }
            }
            $input['photo'] = $name;
        }
        $data->update($input);
        $msg = 'Successfully updated your profile';
        return response()->json($msg);
    }

    public function resetform()
    {
        return view('user.reset');
    }

    public function reset(Request $request)
    {
        $user = Auth::user();
        if ($request->cpass) {
            if (Hash::check($request->cpass, $user->password)) {
                if ($request->newpass == $request->renewpass) {
                    $input['password'] = Hash::make($request->newpass);
                } else {
                    return response()->json(array('errors' => [0 => 'Confirm password does not match.']));
                }
            } else {
                return response()->json(array('errors' => [0 => 'Current password Does not match.']));
            }
        }
        $user->update($input);
        $msg = 'Successfully change your passwprd';
        return response()->json($msg);
    }


    public function package()
    {
        $user = Auth::user();
        $subs = Subscription::all();
        $package = $user->subscribes()->where('status', 1)->orderBy('id', 'desc')->first();
        return view('user.package.index', compact('user', 'subs', 'package'));
    }


    public function vendorrequest($id)
    {
        $subs = Subscription::findOrFail($id);
        $gs = Generalsetting::findOrfail(1);
        $user = Auth::user();
        $package = $user->subscribes()->where('status', 1)->orderBy('id', 'desc')->first();
        if ($gs->reg_vendor != 1) {
            return redirect()->back();
        }
        return view('user.package.details', compact('user', 'subs', 'package'));
    }

    public function vendorrequestsub(Request $request)
    {
        $this->validate($request, [
            'shop_name'   => 'unique:users',
        ], [
            'shop_name.unique' => 'This shop name has already been taken.'
        ]);
        $user = Auth::user();
        $package = $user->subscribes()->where('status', 1)->orderBy('id', 'desc')->first();
        $subs = Subscription::findOrFail($request->subs_id);
        $settings = Generalsetting::findOrFail(1);
        $today = Carbon::now()->format('Y-m-d');
        $input = $request->all();
        $user->is_vendor = 2;
        $user->date = date('Y-m-d', strtotime($today . ' + ' . $subs->days . ' days'));
        $user->mail_sent = 1;
        $user->update($input);
        $sub = new UserSubscription;
        $sub->user_id = $user->id;
        $sub->subscription_id = $subs->id;
        $sub->title = $subs->title;
        $sub->currency = $subs->currency;
        $sub->currency_code = $subs->currency_code;
        $sub->price = $subs->price;
        $sub->days = $subs->days;
        $sub->allowed_products = $subs->allowed_products;
        $sub->details = $subs->details;
        $sub->method = 'Free';
        $sub->status = 1;
        $sub->save();
        if ($settings->is_smtp == 1) {
            $data = [
                'to' => $user->email,
                'type' => "vendor_accept",
                'cname' => $user->name,
                'oamount' => "",
                'aname' => "",
                'aemail' => "",
                'onumber' => "",
            ];
            $mailer = new GeniusMailer();
            $mailer->sendAutoMail($data);
        } else {
            $headers = "From: " . $settings->from_name . "<" . $settings->from_email . ">";
            mail($user->email, 'Your Vendor Account Activated', 'Your Vendor Account Activated Successfully. Please Login to your account and build your own shop.', $headers);
        }

        return redirect()->route('user-dashboard')->with('success', 'Vendor Account Activated Successfully');
    }


    public function favorite($id1, $id2)
    {
        $fav = new FavoriteSeller();
        $fav->user_id = $id1;
        $fav->vendor_id = $id2;
        $fav->save();
    }

    public function favorites()
    {
        $user = Auth::guard('web')->user();
        $favorites = FavoriteSeller::where('user_id', '=', $user->id)->get();
        return view('user.favorite', compact('user', 'favorites'));
    }


    public function favdelete($id)
    {
        $wish = FavoriteSeller::findOrFail($id);
        $wish->delete();
        return redirect()->route('user-favorites')->with('success', 'Successfully Removed The Seller.');
    }


    // Profile Action

    public function edit()
    {
        $countries = Country::all();
        $user = Auth::user();
        return view('user.profile_edit', compact('user', 'countries'));
    }


    public function profile_update(Request $request)
    {
        // --- Validation Section

        $rules =
            [
                'full_name' => 'required',
                'postal_code' => 'required',
                'phone_no' => 'required',
                'email' => 'required|unique:users,email,' . Auth::user()->id
            ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        //--- Validation Section Ends
        $input = $request->all();
        // dd($input);
        $data = Auth::user();
        if ($file = $request->file('profile_photo')) {
            $name = time() . str_replace(' ', '', $file->getClientOriginalName());
            $file->move('assets/images/users/', $name);
            if ($data->photo != null) {
                if (file_exists(public_path() . '/assets/images/users/' . $data->photo)) {
                    unlink(public_path() . '/assets/images/users/' . $data->photo);
                }
            }
            $input['photo'] = $name;
        }
        $input['phone'] = $request->phone_no;
        $input['address'] = $request->address1;
        $input['address2'] = $request->address2;
        $input['zip'] =   $request->postal_code;
        $input['name'] = $request->full_name;
        $input['country_id'] = $request->country_id;
        if ($request->login_password) {

            $input['password'] = Hash::make($request->login_password);
        }
        $data->update($input);
        $msg = 'Successfully updated your profile';
        return Redirect::back()->with('status', 'Your profile has been Successfully updated');
    }

     /**
	 * @developer: Neha thakur ->@created
	 * Date: 27/12/2022
	 * Description:Showed Recent product.
	 */
    public function recentViewed(){ 
        $userid = Auth::user()->id;
        $recent_count = Recentview::with('Product','user')
        ->where('user_id',$userid)
        ->orderBy('id','desc')   
        ->count();
        $recentview_list = Recentview::with('Product','user')
        ->where('user_id',$userid)
        ->orderBy('id','desc') 
        ->take(6)   
        ->get();
        //dd($recentview_list);
        return view('user.recent-viewed', compact('recentview_list','recent_count'));
    }


    /**
	 * @developer: Neha thakur ->@created
	 * Date: 28/01/2022
	 * Description:Pepole Followed list.
	 */
    public function peopleifollow(){
        $userid = Auth::user()->id;     
        $ifollow_count = VendorFollower::all()->where('user_id',$userid)->count();
        $follow = DB::table('vendor_followers')
         ->join('users', 'users.id', '=', 'vendor_followers.vendor_id')
         ->select('users.*','vendor_followers.*')
         ->where('users.is_vendor','1')
         ->where('vendor_followers.user_id', $userid)
         ->get();        
        $count = VendorFollower::all()->where('vendor_id');

        // foreach($follow as $followed) {
        //     $id= $followed->vendor_id;
        //     foreach($count as $vl) {
        //         if($id == $vl->vendor_id) {

        //           $arr[]  = $vl->vendor_id;
                  
        //              $val  =  count($arr);
        //         }            
        //     }
        // }
               
        return view('user.followed_view',compact('ifollow_count','follow','count'));
    }

    public function inbox(){ 
       
        return view('user.inbox');
    }





    public function unfollow(Request $request) {

        if(Auth::user())
        {  
            $unfollow = DB::table('vendor_followers')->where('user_id', Auth::id())->where('vendor_id', $request->input('v_id'))->update(array('email_subscriber' => 0)); 
            if($unfollow){
                return response()->json('Unfollow Successfully!');
            }          
        
        }
   }

   /**
    * @developer:Neha kumari
    * Date: 7/02/2022
    *Decsribtion: Get Items by People I Follow
    */
    public function followitems() {
        $userid = Auth::user()->id;       
        $v_ids = DB::table('vendor_followers')
         ->select('vendor_followers.user_id','vendor_followers.vendor_id')
         ->where('vendor_followers.user_id', $userid)
         ->get();
         foreach($v_ids as $ids) {
             $vendors_id[] = $ids->vendor_id;
         } 
        $followitems = Product::with('user')->whereIn('user_id',$vendors_id)->take(6)->get();
        $count = Product::with('user')->whereIn('user_id',$vendors_id)->count();  
        return view('user.itemsprople_followed',compact('followitems','count'));
    }




    
   


}
