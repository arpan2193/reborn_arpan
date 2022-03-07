<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use App\Models\Currency;

class Subscription extends Model
{
    protected $fillable = ['title','currency','currency_code','price','days','allowed_products','details'];

    public $timestamps = false;

    public function subs()
    {
        return $this->hasMany('App\Models\UserSubscription','subscription_id');
    }

    public function showPrice()
    {
        $gs = cache()->remember('generalsettings', now()->addDay(), function () {
            return DB::table('generalsettings')->first();
        });
        $price = $this->price;

        if ($this->user_id != 0) {
            //$price = $this->price + $gs->fixed_commission + ($this->price / 100) * $gs->percentage_commission;
            $price = $this->price;
        }

        if (!empty($this->size) && !empty($this->size_price)) {
            $price += $this->size_price[0];
        }
        // Attribute Section

        // $attributes = $this->attributes["attributes"];
        // if (!empty($attributes)) {
        //     $attrArr = json_decode($attributes, true);
        // }


        // dd($attrArr);
        // if (!empty($attrVal['values']) && is_array($attrVal['values'])) {

        //     foreach ($attrArr as $attrKey => $attrVal) {
        //         if (is_array($attrVal) && array_key_exists("details_status", $attrVal) && $attrVal['details_status'] == 1) {

        //             foreach ($attrVal['values'] as $optionKey => $optionVal) {
        //                 $price += $attrVal['prices'][$optionKey];
        //                 // only the first price counts
        //                 break;
        //             }
        //         }
        //     }
        // }


        // Attribute Section Ends


        if (Session::has('currency')) {
            $curr = cache()->remember('session_currency', now()->addDay(), function () {
                return DB::table('currencies')->find(Session::get('currency'));
            });
        } else {
            $curr = cache()->remember('default_currency', now()->addDay(), function () {
                return DB::table('currencies')->where('is_default', '=', 1)->first();
            });
        }



        $price = round(($price) * $curr->value, 2);
        $price = number_format($price,2);
        if ($gs->currency_format == 0) {
            return $curr->sign . $price;
        } else {
            return $price . $curr->sign;
        }
    }

}