<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    //
    protected $fillable = [
         'message', 'email',
    ];
}
