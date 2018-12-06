<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class App_config extends Model
{
    protected $fillable = [
        'store_name', 'carousel_products', 'ramdom_products', 'products_per_page', 'nav_materialize_color', 'side_background'
    ];
}
