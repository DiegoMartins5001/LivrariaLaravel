@extends('principal')
@section('conteudo')
<h2 class="text-center">
Lista de Autores
</h2>
<style>
    .botaoE {
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
<table class="table table-striped">
    <thead>
        <th class="text-center">Id</th>
        <th class="text-center">Autor</th>
        <th class="text-center">Livros Relacionados</th>
        <th class="text-center">Alterar</th>
        <th class="text-center">Excluir</th>
    </thead>
@foreach ($autor as $a)
    <tr>
        <td>{{ $a->id_autor }}</td>
        <td>{{ $a->nome_autor }}</td>
        <td>{{ $a->titulo }}
            {!! Form::select('id', $a->livros()->lists('titulo','id'), null, ['placeholder' => 'Livros...']) !!}
        </td>
        <td>
            <a class="botao" href="{{ url('autor/alterar-autor/'.$a->id_autor) }}">
                <strong>Alterar</strong>
            </a>
        </td>
        <td>
            <a class="botaoE" href="{{ url('autor/excluir-autor/'.$a->id_autor) }}">
                <strong>Excluir</strong>
            </a>
        </td>
        <td>
            {!! Form::open(array('url' => 'autor/alterar-autor')) !!}
            
            {!! Form::hidden('id_autor', $a->id_autor) !!}
            {!! Form::close() !!}
        </td>

    </tr>
@endforeach
</table>
<p class="alerta">A exclussão feita apartir de Autor irá deletar seus Livros !!!</p>
{!! str_replace('/?','?',$autor->render())!!}
@stop