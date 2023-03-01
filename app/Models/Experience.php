<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory,CommonTrait;
    protected $fillable = [
        'designation',
        'company_name',
        'passing_year',
        'description',
        'status',
    ];
}
