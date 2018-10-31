<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    protected $table    = 'todolist';
    protected $fillable = [
        'id',
        'description',
        'status'
    ];
}
