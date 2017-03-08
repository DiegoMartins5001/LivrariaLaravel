@extends('principal')
@section('conteudo')
<h2>
Lista de Livros
</h2>
<style>
    .botaoE{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
    color: #ffffff;
    padding: 2px 20px;
    background: -moz-linear-gradient(
        top,
        #ff0000 0%,
        #000000);
    background: -webkit-gradient(
        linear, left top, left bottom,
        from(#ff0000),
        to(#000000));
    -moz-border-radius: 30px;
    -webkit-border-radius: 30px;
    border-radius: 30px;
    border: 1px solid #000000;
    -moz-box-shadow:
        0px 1px 3px rgba(000,000,000,0.5),
        inset 0px 0px 1px rgba(255,255,255,0.7);
    -webkit-box-shadow:
        0px 1px 3px rgba(000,000,000,0.5),
        inset 0px 0px 1px rgba(255,255,255,0.7);
    box-shadow:
        0px 1px 3px rgba(000,000,000,0.5),
        inset 0px 0px 1px rgba(255,255,255,0.7);
    text-shadow:
        0px -1px 0px rgba(000,000,000,0.4),
        0px 1px 0px rgba(255,255,255,0.3);
    }
    .botao {
        font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
    color: #0a000a;
    padding: 2px 20px;
    background: -moz-linear-gradient(
        top,
        #ffffff 0%,
        #09e6e6 50%,
        #00bbff 50%,
        #6d8000);
    background: -webkit-gradient(
        linear, left top, left bottom,
        from(#ffffff),
        color-stop(0.50, #09e6e6),
        color-stop(0.50, #00bbff),
        to(#6d8000));
    -moz-border-radius: 20px;
    -webkit-border-radius: 20px;
    border-radius: 20px;
    border: 2px solid #6d8000;
    -moz-box-shadow:
        0px 1px 14px rgba(074,002,074,0.3),
        inset 0px 0px 2px rgba(255,255,255,1);
    -webkit-box-shadow:
        0px 1px 14px rgba(074,002,074,0.3),
        inset 0px 0px 2px rgba(255,255,255,1);
    box-shadow:
        0px 1px 14px rgba(074,002,074,0.3),
        inset 0px 0px 2px rgba(255,255,255,1);
    text-shadow:
        0px -1px 0px rgba(000,000,000,0.2),
        0px 1px 0px rgba(255,255,255,0.4);
    }
</style>
{!! Html::style('/css/bootstrap.css') !!}
<table class="table table-hover">
    <thead class="cima">
        <th class="text-center">id</th>
        <th class="text-center">Título</th>
        <th class="text-center">Autor</th>
        <th class="text-center">Código de Barra</th>
        <th class="text-center">Criado Em</th>
        <th class="text-center">Atualizado Em</th>
        <th class="text-center">Atualizar / Excluir</th>
    </thead>
@foreach ($livro as $liv)
    <tr>
        <td>{{ $liv->id }}</td>
        <td>{{ $liv->titulo }}</td>
        <td>{{ $liv->autor->nome_autor }}</td>
        <td>{{ $liv->cod_barra }}</td>
        <td>{{ $liv->created_at->format('d/m/Y H:i')}}</td>
        <td>{{ $liv->updated_at->format('d/m/Y H:i')}}</td>
        <td>
            <a class="botao" href="{{ url('livro/alterar/'.$liv->id) }}">
                <strong>Alterar</strong>
            </a> 
            <a class="botaoE" href="{{ url('livro/excluir/'.$liv->id) }}">
                <strong>Excluir</strong>
            </a>  
        </td>
        <td>
            {!! Form::open(array('url' => 'livro/alterar')) !!}
            {!! Form::hidden('id', $liv->id) !!}
            {!! Form::close() !!}
        </td>
    </tr>
@endforeach
</table>
{!! str_replace('/?','?',$livro->render())!!}
<br/>
@stop