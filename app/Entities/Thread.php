<?php

namespace LaravelItalia\Entities;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
