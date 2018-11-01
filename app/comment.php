<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function user() {
    	return $this->belongsTo('ArticulosReligiosos\User');
    }

    public function replies(){
        return $this->hasMany('ArticulosReligiosos\Replie');
    }

    public function product() {
    	return $this->belongsTo('ArticulosReligiosos\Product');
    }
}
