<?php

namespace Todolist\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model {

    protected $table = 'livro';
    protected $foreignKey = 'id_autor';
    protected $timestamp = false;
    protected $fillable = array('titulo','id_autor','cod_barra');
    //protected $fillable = array('autor');
    //protected $fillable = array('cod_barra');
    public function autor(){
        return $this->belongsTo('Todolist\Models\Autor','id_autor','id_autor');
    }

}