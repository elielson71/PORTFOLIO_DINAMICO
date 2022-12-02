<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayoutSessao extends Model
{
    use HasFactory;
    protected $table = 'layout_sessao';
    protected $fillable = ['id','order_sessao','layout_id','sessao_id'];
}
