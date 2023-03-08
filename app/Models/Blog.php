<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory,CommonTrait;
    protected $fillable = [
        'image',
        'title',
        'content',
        'created_by',
        'tags',
        'status',
    ];

   
}
