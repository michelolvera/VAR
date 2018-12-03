<?php

namespace ArticulosReligiosos;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text',
    ];

    public function user() {
    	return $this->belongsTo('ArticulosReligiosos\User');
    }

    public function replie(){
        return $this->hasOne('ArticulosReligiosos\Replie');
    }

    public function product() {
    	return $this->belongsTo('ArticulosReligiosos\Product');
    }
}
