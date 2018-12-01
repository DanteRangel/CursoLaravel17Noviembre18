<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    protected $table ='permission';

    protected $fillable = ['name'];

    public $timestamps = false;
}
