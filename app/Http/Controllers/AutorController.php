<?php

namespace Todolist\Http\Controllers;

use Illuminate\Http\Request;
use Todolist\Http\Requests;
use Todolist\Http\Controllers\Controller;
use Todolist\Models\Autor;
use Todolist\Models\Livro;

class AutorController extends Controller
{

    public function listarAutor(Autor $autor)
    {
        
        $data['autor'] = Autor::paginate(4);
        //dd($data);
        return view('livros.listar-autor', $data);
       // return view('livros/listar-autor', compact('autor'));
    }

    public function salvarAutor(Request $request, Autor $autor) {
        //dd($autor);
        $altera = '';
        if ($request->has('id_autor')){
            $altera = ','.$request->get('id_autor').',id_autor';
        } 
        $this->validate($request, [
            'nome_autor' => 'required|min:4|unique:autor,nome_autor'.$altera.''
        ]);
        $this->validate($request, [
            'nome_autor' => 'required|max:30|unique:autor,nome_autor'.$altera.''
        ]);

        if ($request->has('id_autor')) {
            $autor = $autor->find($request->get('id_autor'));

            if ($autor != null) {
                // se encontrou o id da tarefa, altera
                $autor->update($request->all());
                
                return redirect(url('autor/listar-autor'));
            }
        }
        //dd($request->all());
        $autor->create($request->all());

        return redirect(url('autor/listar-autor'));
    }


    public function novoAutor(Request $request)
    {
        return view('livros.novo_autor');
    }

    public function alterarAutor(Autor $autor, $id_autor)
    {
 
        $autor = $autor->find($id_autor);
        //dd($livro);

        if ($autor != null) {
            $data['autor'] = $autor;
            //dd($data);
            return view('livros.alterar-autor', $data);
        } else {
            return redirect(url('autor/listar-autor'));
        }
    }
    public function excluirAutor(Request $request, Autor $autor, $id_autor = null) {
        $autor = Autor::find($id_autor);
        $livro = Livro::where('id_autor',$id_autor);
        $livro->delete();
        $autor->delete();
        $this->validate($request, [
            'id_autor' => 'delete|unique:autor,id_autor'
        ]);
        //dd($request);
        return redirect(url('autor/listar-autor'));
    }

}