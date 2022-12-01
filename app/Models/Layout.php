<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    use HasFactory;
    protected $fillable = ['titulo'];
    protected $table = 'layout';

    public function sessao()
    {
        return $this->belongsToMany(Sessao::class);
    }
}
