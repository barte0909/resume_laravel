<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profiles extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'career',
        'profile',
        'gmail',
        'github',
        'contact',
        'linkedin',
        'skills',
        'career_content',
        'reference',
        'education',
    ];

}
