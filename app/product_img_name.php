<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Product_img_name extends Model
{
    protected $fillable = [
        'name',
    ];
    
    public function product() {
    	return $this->belongsTo('ArticulosReligiosos\Product');
    }
}
