<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    //
    protected $fillable = [
        'flower_id', 'header_id', 'quantity',
    ];

    protected $table = 'detail';

    public function Flower(){
        return $this->hasOne('App\Flower', 'id', 'flower_id');
    }

    public function Header(){
        return $this->hasOne('App\Header', 'id', 'header_id');
    }
}
