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


class InboxController extends Controller
{
    public function index()
    {
        $user = Auth::user();   
        return view('vendor.inbox',compact('user'));
    }
}
