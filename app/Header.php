<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    //
    protected $fillable = [
        'users_id', 'total_price',
    ];

    protected $table = 'header';

    public function User(){
        return $this->hasOne('App\User', 'id', 'users_id');
    }
}
