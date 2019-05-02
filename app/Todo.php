<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = [];

    public function list()
    {
        return $this->belongsto(TodoList::class);
    }
}
