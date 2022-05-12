<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_image extends Model
{
    protected $table='payment_images';
    protected $fillable=['supplier_id','image_url'];
    public function image(){
        return $this->belongsTo(Payment::class);
    }
}
