<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
   protected $fillable =
       [
         'name',
         'description'
       ];

    public function game()
    {
        return $this->hasMany(Game::class);
    }
}
