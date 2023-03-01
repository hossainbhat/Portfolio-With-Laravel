<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'email',
        'mobile',
        'facebook',
        'twitter',
        'youtube',
        'github',
        'total_project',
        'experience_year',
        'happy_customer',
        'awards',
        'fave_icon',
        'logo'
    ];
}
