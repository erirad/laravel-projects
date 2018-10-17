<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    public function author() {            //foreign  local
      return $this->hasOne('App\Author', 'id', 'author_id');
    }
}
