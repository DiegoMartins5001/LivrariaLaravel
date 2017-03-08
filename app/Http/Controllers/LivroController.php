<?php

namespace Todolist\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Todolist\Http\Requests;
use Todolist\Http\Controllers\Controller;
use Todolist\Models\Livro;
use Todolist\Models\Autor;
//use Carbon\Carbon;


class LivroController extends Controller {

    // Carrega do modelo as tarefas realizadas e chama a visão de tarefas realizadas
    public function listarLivros(Livro $livro) {
        $data['livro'] = Livro::paginate(4);
        //dd($data['livro']->nextPageUrl());
        //$date = Livro::all()->lists('created_at');
        //$date = Carbon::createFromFormat('d/m/Y', $date);
        //dd($date);
        //$data = Carbon::createFromFormat('dd/mm/YYYY', $data[]);
        return view('livros.listar', $data);
    }

    // Apenas monta a visão do formulário de nova tarefa
    public function novo() {
        $autor = Autor::all()->lists('nome_autor','id_autor');
        //dd($autor);
        $data['autor'] = $autor;
        return view('livros.novo', $data);
    }

    // Encontra a tarefa para alterar e monta a visão do formulário de alterar tarefa
    public function alterar(Livro $livro, $id) {
        // pesquisa a tarefa pelo id passado no parâmetro
        
        $autor = Autor::all()->lists('nome_autor','id_autor');
        //dd($autor);
        $data['autor'] = $autor;

        // da url
        $livro = $livro->find($id);
        //dd($livro);

        if ($livro != null) {
            // se o resultado da pesquisa pelo id não for 
            //nulo, retorna a view
            // com o form de alteração
            $data['livro'] = $livro;
            //dd($data);
            return view('livros.alterar', $data);
        } else {
            // se fornulo o resultado, redireciona 
            // para as tarefas pendentes
            return redirect(url('livro/listar-livros'));
        }
    }

    // Salva os dados da tarefa enviados por POST, veja em routes.php
    // Recebe do framework (injeção de dependência) os objetos necessários
    public function salvar(Request $request, Livro $livro) {
        $m = '';
        if ($request->has('id')){
            $m = ','.$request->get('id').',id';
        }
        //dd($m);
        $this->validate($request, [
            'titulo' => 'required|min:4|unique:livro,titulo'.$m.'',
            'id_autor' => 'required|unique:autor,nome_autor',
            'cod_barra' => 'numeric|unique:livro,cod_barra'.$m.''
        ]);
        $this->validate($request, [
            'cod_barra' => 'required|min:12|unique:livro,cod_barra'.$m.''
        ]);
        $this->validate($request, [
            'cod_barra' => 'required|max:12|unique:livro,cod_barra'.$m.''
        ]);

        if ($request->has('id')) {
            $livro = $livro->find($request->get('id'));
            

            if ($livro != null) {
                // se encontrou o id da tarefa, altera
                $livro->update($request->all());
                
                return redirect(url('livro/listar-livros'));
            }
        }
        

        // se chegar neste ponto é por que não realizou o return na alteração
        // então
        // Cria um novo registro no banco de dados com os parâmetros
        // preenchidos no form e enviados pelo Request
        $livro->create($request->all());

        // Monta a resposta com redirecionamento para a página principal de tarefas
        return redirect(url('livro/listar-livros'));
    }
    public function excluir(Request $request, Livro $livro, $id = null) {
        $livro = Livro::find($id);
        

        $livro->delete();
        //dd($request);
        return redirect(url('livro/listar-livros'));
    }

}