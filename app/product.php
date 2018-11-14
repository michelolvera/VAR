<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
    * Get the route key for the model.
    *
    * @return string
    */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    protected $fillable = [
        'name', 'description', 'price', 'discount_percent', 'quantity', 'pinned', 'slug'
    ];

    public function comments(){
        return $this->hasMany('ArticulosReligiosos\Comment');
    }

    public function product_img_names(){
        return $this->hasMany('ArticulosReligiosos\Product_img_name');
    }

    public function subcategorie() {
    	return $this->belongsTo('ArticulosReligiosos\Subcategorie');
    }

    public function sales()
    {
        return $this->belongsToMany('ArticulosReligiosos\Sale');
    }
}
