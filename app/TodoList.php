<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $guarded = [];

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
