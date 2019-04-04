<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable =
        [
            'name',
            'description',
            'genres_id',
            'games_id'
        ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
