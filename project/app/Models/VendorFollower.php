<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class VendorFollower extends Model
{
    protected $fillable = ['user_id', 'vendor_id','vendor_country','user_country','email_subscriber'];
    protected $table = 'vendor_followers';

    

   
     
}
