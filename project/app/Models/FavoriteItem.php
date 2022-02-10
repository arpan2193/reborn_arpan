<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavoriteItem extends Model
{
    protected $fillable = ['user_id', 'product_id'];
    protected $table = 'favorite_items';
    
    // @Developer:Neha kumari
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault(function ($data) {
            foreach ($data->getFillable() as $dt) {
                $data[$dt] = __('Deleted');
            }
        });
    }
}
