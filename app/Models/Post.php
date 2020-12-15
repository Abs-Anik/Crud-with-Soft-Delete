<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];  

    protected $fillable = [
        'post_name',
        'description',
        'is_active'
    ];
}