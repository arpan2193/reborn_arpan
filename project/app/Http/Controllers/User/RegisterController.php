<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Generalsetting;
use App\Models\User;
use App\Models\Country;
use App\Classes\GeniusMailer;
use App\Models\Notification;
use Auth;

use Validator;

class RegisterController extends Controller
{
	public function index()
	{
		$countries = Country::orderBy('country_name', 'asc')->get();
		// dd($countries);
		return view('front.signin', compact('countries'));
	}

	public function vendorindex()
	{
		$countries = Country::orderBy('country_name', 'asc')->get();
		// dd($countries);
		return view('front.create-nursery', compact('countries'));
	}

	public function register(Request $request)
	{

		$gs = Generalsetting::findOrFail(1);

		if ($gs->is_capcha == 1) {
			$value = session('captcha_string');
			if ($request->codes != $value) {
				return response()->json(array('errors' => [0 => 'Please enter Correct Capcha Code.']));
			}
		}


		//--- Validation Section

		$rules = [
			'email'   => 'required|email|unique:users',
			'password' => 'required|confirmed'
		];
		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
		}
		//--- Validation Section Ends

		$user = new User;
		$input = $request->all();
		// dd($input);   
		$input['password'] = bcrypt($request['password']);
		$token = md5(time() . $request->name . $request->email);
		$input['verification_link'] = $token;
		$input['affilate_code'] = md5($request->name . $request->email);

		if (!empty($request->vendor)) {
			//--- Validation Section
			$rules = [
				'shop_name' => 'unique:users',
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
			if (!empty($request->paypal) || !empty($request->venmo) || !empty($request->venmo) || !empty($request->square) || !empty($request->check) || !empty($request->certified_funds) || !empty($request->money_order) || !empty($request->cash) || !empty($request->bank_transfer) || !empty($request->custompayment1) || !empty($request->custompayment2) || !empty($request->custompayment3)) {
				$input['payments_accepted'] = $request->paypal . "," . $request->venmo . "," . $request->square . "," . $request->check . "," . $request->certified_funds . "," . $request->money_order . "," . $request->cash . "," . $request->bank_transfer . "," . $request->custompayment1 . "," . $request->custompayment2 . "," . $request->custompayment3;
				$input['is_vendor'] = 1;
			}
		}
		// dd($input);
		// $user->insert($input);
		$user->fill($input)->save();
		if ($gs->is_verification_email == 1) {
			$to = $request->email;
			$subject = 'Verify your email address.';
			$msg = "Dear Customer,<br> We noticed that you need to verify your email address. <a href=" . url('user/register/verify/' . $token) . ">Simply click here to verify. </a>";
			//Sending Email To Customer
			if ($gs->is_smtp == 1) {
				$data = [
					'to' => $to,
					'subject' => $subject,
					'body' => $msg,
				];

				$mailer = new GeniusMailer();
				$mailer->sendCustomMail($data);
			} else {
				$headers = "From: " . $gs->from_name . "<" . $gs->from_email . ">";
				mail($to, $subject, $msg, $headers);
			}
			return response()->json('We need to verify your email address. We have sent an email to ' . $to . ' to verify your email address. Please click link in that email to continue.');
		} else {

			$user->email_verified = 'Yes';
			$user->update();
			$notification = new Notification;
			$notification->user_id = $user->id;
			$notification->save();
			Auth::guard('web')->login($user);
			if (!empty($request->vendor)) {
				return response()->json(2);
			} else {
				return response()->json(1);
			}
		}
	}

	public function token($token)
	{
		$gs = Generalsetting::findOrFail(1);

		if ($gs->is_verification_email == 1) {
			$user = User::where('verification_link', '=', $token)->first();
			if (isset($user)) {
				$user->email_verified = 'Yes';
				$user->update();
				$notification = new Notification;
				$notification->user_id = $user->id;
				$notification->save();
				Auth::guard('web')->login($user);
				return redirect()->route('user-dashboard')->with('success', 'Email Verified Successfully');
			}
		} else {
			return redirect()->back();
		}
	}
}
