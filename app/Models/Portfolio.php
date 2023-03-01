<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory,CommonTrait;
    protected $fillable = [
        'image',
        'title',
        'client_name',
        'langages',
        'project_type',
        'project_link',
        'status',
    ];
}
