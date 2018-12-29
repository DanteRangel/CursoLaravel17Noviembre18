<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $fillable = [
        "name", "description", "price", "stock", "id_category", "id_brand"
    ];
    public $timestamps = false;

    public function images() {
        return $this->hasMany('App\Image', 'id_product');
    }
    public function brand() {
        return $this->belongsTo('App\Brand', 'id_brand');
    }
    public function category(){
        return $this->belongsTo('App\Category', 'id_category');
    }
}
