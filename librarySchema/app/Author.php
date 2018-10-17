<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    public function books() {                  //foreign, local
      return $this->hasMany('App\Book', 'author_id', 'id');

    }
}
