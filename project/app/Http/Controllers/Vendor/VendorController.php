<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Generalsetting;
use App\Models\Subcategory;
use App\Models\VendorOrder;
use App\Models\Verification;
use Auth;
use Illuminate\Http\Request;
use DB;

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
        ->where('vendor_forums.user_id','=',auth()->id())
		->select('vendor_forums.*', 'users.name','users.id AS userid')
		->get();
        if(count($forums)>0){
            for($i=0;$i<count($forums); $i++){
                $child_forums = DB::table('vendor_forums')
                ->join('users', 'vendor_forums.user_id', '=', 'users.id')
                ->where('vendor_forums.pid','=',$forums[$i]->id)
                ->select('vendor_forums.*', 'users.name','users.id as userid')
                ->get();
                if(count($child_forums)>0){
                    $forums[$i]->comments=$child_forums;
                }

            }
        }
        return view('vendor.dashboard',compact('user','forums'));
    }

    public function followers(){
        $user = Auth::user();   
        return view('vendor.followers',compact('user'));
    }

    public function review(){
        $user = Auth::user();   
        return view('vendor.review',compact('user'));
    }

    public function myaccount(){
        $user = Auth::user();   
        return view('vendor.myaccount',compact('user'));
    }
    public function faq(){
        $user = Auth::user();   
        return view('vendor.faq',compact('user'));
    }
}
