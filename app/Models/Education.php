<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory,CommonTrait;
    protected $fillable = [
        'degree_name',
        'school_name',
        'passing_year',
        'description',
        'status',
    ];
}
