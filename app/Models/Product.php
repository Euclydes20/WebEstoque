<?php

namespace WebEstoque\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = [
        'descricao',
        'qtd',
        'prc_venda',
        'prc_compra',
    ];
}
