<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "image";
    protected $fillable = [
        "id_product", "url"
    ];
    public $timestamps = false;

    public function product() {
        return $this->belongsTo('App\Product', 'id_product');
    }

}
