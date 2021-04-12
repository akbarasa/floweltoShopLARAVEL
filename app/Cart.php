<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = [
        'flower_id', 'users_id', 'quantity','sub_price'
    ];

    protected $table = 'cart';

    public function Flower(){
        return $this->hasOne('App\Flower', 'id', 'flower_id');
    }

    public function User(){
        return $this->hasOne('App\User', 'id', 'users_id');
    }
}
