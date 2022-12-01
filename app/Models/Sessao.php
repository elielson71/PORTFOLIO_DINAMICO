<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sessao extends Model
{
    protected $table = 'sessao';
    protected $fillable = ['titulo','conteudo','link'];

    public function layout()
    {
        return $this->belongsToMany(Layout::class);
    }

}
