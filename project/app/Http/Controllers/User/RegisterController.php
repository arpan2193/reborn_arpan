<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Generalsetting;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Country;
use App\Classes\GeniusMailer;
use App\Models\Notification;
use Auth;
use Illuminate\Support\Facades\Date;
use Validator;

class RegisterController extends Controller
{
	public function index()
	{
		$this->code_image();
		$countries = Country::orderBy('country_name', 'asc')->get();
		// dd($countries);
		return view('front.signin', compact('countries'));
	}

	public function vendorindex()
	{
		$this->code_image();
		$countries = Country::orderBy('country_name', 'asc')->get();
		// dd($countries);
		return view('front.create-nursery', compact('countries'));
	}

	public function register(Request $request)
	{

		$gs = Generalsetting::findOrFail(1);
		$subscription_data = Subscription::where("title","=","Basic")->first();
		// dd($subscription_data);
		if ($gs->is_capcha == 1) {
			$value = session('captcha_string');
			if ($request->codes != $value) {
				return response()->json(array('errors' => [0 => 'Please enter Correct Capcha Code.']));
			}
		}
		//--- Validation Section
		$rules = [
			'email'   => 'required|email|unique:users',
			'password' => 'required|confirmed',
			'password_confirmation' => 'required|same:password',
			'name' => 'required'
		];
		$validator = Validator::make($request->all(), $rules);

		if ($validator->fails()) {
			return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
		}
		//--- Validation Section Ends		
		$user = new User;
		$input = $request->all();
		   
		$input['password'] = bcrypt($request['password']);
		$token = md5(time() . $request->name . $request->email);
		$input['verification_link'] = $token;
		$input['affilate_code'] = md5($request->name . $request->email);
		$future_timestamp = strtotime("+".$subscription_data['days']." month");
       
		
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
			$payment_mode_arr = array();
			foreach($request->payment_mode as $key => $val){
				$payment_mode_arr2 = array("$key" => "$val");
				$payment_mode_arr= array_merge($payment_mode_arr, $payment_mode_arr2);
			}
			$input['payments_accepted'] = json_encode($payment_mode_arr);
			$input['is_vendor'] = 1;
			$input['is_subscribe'] = 1;	
			// if (!empty($request->paypal) || !empty($request->venmo) || !empty($request->venmo) || !empty($request->square) || !empty($request->check) || !empty($request->certified_funds) || !empty($request->money_order) || !empty($request->cash) || !empty($request->bank_transfer) || !empty($request->custompayment1) || !empty($request->custompayment2) || !empty($request->custompayment3)) {
			// 	$input['payments_accepted'] = $request->paypal . "," . $request->venmo . "," . $request->square . "," . $request->check . "," . $request->certified_funds . "," . $request->money_order . "," . $request->cash . "," . $request->bank_transfer . "," . $request->custompayment1 . "," . $request->custompayment2 . "," . $request->custompayment3;
			// 	$input['is_vendor'] = 1;
			// 	$input['is_subscribe'] = 1;	
						
			// }
			$input['subscribe_expired'] = date('Y-m-d', $future_timestamp);

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

	// Capcha Code Image
    private function  code_image()
    {
        $actual_path = str_replace('project','',base_path());
        $image = imagecreatetruecolor(200, 50);
        $background_color = imagecolorallocate($image, 255, 255, 255);
        imagefilledrectangle($image,0,0,200,50,$background_color);

        $pixel = imagecolorallocate($image, 0,0,255);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixel);
        }

        $font = $actual_path.'assets/front/fonts/NotoSans-Bold.ttf';
        $allowed_letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $length = strlen($allowed_letters);
        $letter = $allowed_letters[rand(0, $length-1)];
        $word='';
        //$text_color = imagecolorallocate($image, 8, 186, 239);
        $text_color = imagecolorallocate($image, 0, 0, 0);
        $cap_length=6;// No. of character in image
        for ($i = 0; $i< $cap_length;$i++)
        {
            $letter = $allowed_letters[rand(0, $length-1)];
            imagettftext($image, 25, 1, 35+($i*25), 35, $text_color, $font, $letter);
            $word.=$letter;
        }
        $pixels = imagecolorallocate($image, 8, 186, 239);
        for($i=0;$i<500;$i++)
        {
            imagesetpixel($image,rand()%200,rand()%50,$pixels);
        }
        session(['captcha_string' => $word]);
        imagepng($image, $actual_path."assets/images/capcha_code.png");
    }
}
