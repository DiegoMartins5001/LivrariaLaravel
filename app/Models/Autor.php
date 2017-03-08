<?php

namespace Todolist\Models;

use Illuminate\Database\Eloquent\Model;
//use Todolist\Livro;

class Autor extends Model {

    protected $table = 'autor';
    protected $primaryKey = 'id_autor';
    protected $foreignKey = 'id';
    protected $timestamp = false;

    //protected $updated_at = false;
    //protected $created_at = false;
    protected $fillable = array('nome_autor');
    //protected $connection = 'pgsql';
    //protected $fillable = array('autor');
    //protected $fillable = array('cod_barra');
    public function livros(){
        return $this->hasMany('Todolist\Models\Livro','id_autor','id_autor');
    }

}