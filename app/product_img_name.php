<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Product_img_name extends Model
{
    //
    public function product() {
    	return $this->belongsTo('ArticulosReligiosos\Product');
    }
}
