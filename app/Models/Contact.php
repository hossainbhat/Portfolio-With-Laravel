<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory,CommonTrait;
    protected $fillable = [
        'name',
        'email',
        'subject',
        'content',
        'status',
    ];
}
