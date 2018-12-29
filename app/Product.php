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
}
