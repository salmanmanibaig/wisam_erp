<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public function product_images(){

        return $this->hasMany(ProductImage::class,'product_id','id');

        }
}
