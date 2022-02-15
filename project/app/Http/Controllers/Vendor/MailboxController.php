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


class MailboxController extends Controller
{
    public function index()
    {
        $user = Auth::user();  
        $users = DB::table('users')->where('is_vendor','=',0)->get();  
        $inboxs = DB::table('mailbox')
		->join('users', 'mailbox.sent_from', '=', 'users.id')
		->where('mailbox.reply_from','=',0)
        ->where('mailbox.blocked','=',0)
        ->where('mailbox.deleted','=',0)
        ->where('mailbox.sent_to','=',auth()->id())
		->select('mailbox.*', 'users.name','users.photo')
		->get();
        $sentmails = DB::table('mailbox')
        ->where('mailbox.reply_from','=',0)
        ->where('mailbox.blocked','=',0)
        ->where('mailbox.deleted','=',0)
        ->where('mailbox.sent_from','=',auth()->id())
        ->get();
        $deletemails = DB::table('mailbox')
        ->where('mailbox.deleted','=',1)
        ->where('mailbox.sent_to','=',auth()->id())
        ->get();
        $blockedmails = DB::table('mailbox')
        ->where('mailbox.blocked','=',1)
        ->where('mailbox.sent_to','=',auth()->id())
        ->get();
        return view('vendor.inbox',compact('user','inboxs','users','sentmails','deletemails','blockedmails'));
    }

    public function sentmail(){
        $user = Auth::user();  
        $users = DB::table('users')->where('is_vendor','=',0)->get();  
        $inboxs = DB::table('mailbox')
		->join('users', 'mailbox.sent_from', '=', 'users.id')
		->where('mailbox.reply_from','=',0)
        ->where('mailbox.blocked','=',0)
        ->where('mailbox.deleted','=',0)
        ->where('mailbox.sent_to','=',auth()->id())
		->select('mailbox.*', 'users.name','users.photo')
		->get();
        $sentmails =  DB::table('mailbox')
		->join('users', 'mailbox.sent_to', '=', 'users.id')
		->where('mailbox.reply_from','=',0)
        ->where('mailbox.blocked','=',0)
        ->where('mailbox.deleted','=',0)
        ->where('mailbox.sent_from','=',auth()->id())
		->select('mailbox.*', 'users.name','users.photo')
		->get();
        $deletemails = DB::table('mailbox')
        ->where('mailbox.deleted','=',1)
        ->where('mailbox.sent_to','=',auth()->id())
        ->get();
        $blockedmails = DB::table('mailbox')
        ->where('mailbox.blocked','=',1)
        ->where('mailbox.sent_to','=',auth()->id())
        ->get();
        return view('vendor.sentmail',compact('user','inboxs','users','sentmails','deletemails','blockedmails'));
        

    }

    public function blockedmail(){
        $user = Auth::user();  
        $users = DB::table('users')->where('is_vendor','=',0)->get();  
        $inboxs = DB::table('mailbox')
		->join('users', 'mailbox.sent_from', '=', 'users.id')
		->where('mailbox.reply_from','=',0)
        ->where('mailbox.blocked','=',0)
        ->where('mailbox.deleted','=',0)
        ->where('mailbox.sent_to','=',auth()->id())
		->select('mailbox.*', 'users.name','users.photo')
		->get();
        $sentmails =  DB::table('mailbox')
		->join('users', 'mailbox.sent_to', '=', 'users.id')
		->where('mailbox.reply_from','=',0)
        ->where('mailbox.blocked','=',0)
        ->where('mailbox.deleted','=',0)
        ->where('mailbox.sent_from','=',auth()->id())
		->select('mailbox.*', 'users.name','users.photo')
		->get();
        $deletemails = DB::table('mailbox')
        ->join('users', 'mailbox.sent_to', '=', 'users.id')
        ->where('mailbox.deleted','=',1)
        ->where('mailbox.sent_to','=',auth()->id())
        ->get();
        $blockedmails = DB::table('mailbox')
        ->join('users', 'mailbox.sent_to', '=', 'users.id')
        ->where('mailbox.blocked','=',1)
        ->where('mailbox.sent_to','=',auth()->id())
        ->get();
        return view('vendor.blockedmail',compact('user','inboxs','users','sentmails','deletemails','blockedmails'));
        

    }
    public function deletedmail(){
        $user = Auth::user();  
        $users = DB::table('users')->where('is_vendor','=',0)->get();  
        $inboxs = DB::table('mailbox')
		->join('users', 'mailbox.sent_from', '=', 'users.id')
		->where('mailbox.reply_from','=',0)
        ->where('mailbox.blocked','=',0)
        ->where('mailbox.deleted','=',0)
        ->where('mailbox.sent_to','=',auth()->id())
		->select('mailbox.*', 'users.name','users.photo')
		->get();
        $sentmails =  DB::table('mailbox')
		->join('users', 'mailbox.sent_to', '=', 'users.id')
		->where('mailbox.reply_from','=',0)
        ->where('mailbox.blocked','=',0)
        ->where('mailbox.deleted','=',0)
        ->where('mailbox.sent_from','=',auth()->id())
		->select('mailbox.*', 'users.name','users.photo')
		->get();
        $deletemails = DB::table('mailbox')
        ->join('users', 'mailbox.sent_to', '=', 'users.id')
        ->where('mailbox.deleted','=',1)
        ->where('mailbox.sent_to','=',auth()->id())
        ->get();
        $blockedmails = DB::table('mailbox')
        ->join('users', 'mailbox.sent_to', '=', 'users.id')
        ->where('mailbox.blocked','=',1)
        ->where('mailbox.sent_to','=',auth()->id())
        ->get();
        return view('vendor.deletedmail',compact('user','inboxs','users','sentmails','deletemails','blockedmails'));
        

    }
}
