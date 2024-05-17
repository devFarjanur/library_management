<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'edition', 'quantity', 'description'];

    // public function borrows()
    // {
    //     return $this->hasMany(Borrow::class);
    // }





}
