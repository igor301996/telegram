<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable =
        [
            'name',
            'description',
            'genres_id'
        ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function account()
    {
        return $this->hasMany(Account::class);
    }
}
