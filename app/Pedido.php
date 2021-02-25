<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'nombre', 'tipo_id', 'cantidad_id', 'imagen', 'precio'
    ];


    public function tipoPedidos(){
        return $this->belongsTo(Tipo::class,'tipo_id');
        return $this->belongsTo(Cantidad::class,'cantidad_id');
    }

    // OBTENEMOS LA RECETA DESDE  FK

    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id'); // FK de esta tabla
    }
}
