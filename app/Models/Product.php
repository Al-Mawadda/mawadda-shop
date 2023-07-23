<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class Product extends Model{

    protected $guarded = ["id"];

    public function cat(){

        return $this->belongsTo('App\Models\Category','cat_id');

    }

    public function getImgAttribute($img){

      return asset('public/'.$img);
    }
}
