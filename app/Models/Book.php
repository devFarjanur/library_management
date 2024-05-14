<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Book extends Model
{


    protected $fillable = [
        'photo',
        'name',
        'description',
        'stock', 
    ];



    public function bookcategory()
    {
        return $this->belongsTo(Category::class);
    }

   
}
