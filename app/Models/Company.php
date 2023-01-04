<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['id','nome',
    'phone',
    'address',
    'instragem',
    'twitter',
    'facebook',
    'linkedin',
    'youtube',
    'color_site',
    'text_footer_site',
    'path_logo',
    'path_icon'];
}
