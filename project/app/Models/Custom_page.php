<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Custom_page extends Model
{
    protected $fillable = ['_token','name','slug','title','subtitle','banner','featured_image','body1','body2','body3','body4','body5','meta_key','meta_description'];
    public $timestamps = false;
}