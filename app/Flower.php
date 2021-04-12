<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    //
    protected $fillable = [
        'flower_name', 'category_id', 'flower_pic', 'flower_price', 'flower_desc',
    ];

    protected $table = 'flower';

    public function Category(){
        return $this->hasOne('App\Category', 'id', 'category_id');
    }

}
