@extends('principal')
@section('conteudo')
<h2>
Novo Autor
</h2>
<style>
.botao {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #050505;
	padding: 10px 27px;
	background: -moz-linear-gradient(
		top,
		#ffffff 0%,
		#babdd1 50%,
		#6b36cf 50%,
		#bbc76d);
	background: -webkit-gradient(
		linear, left top, left bottom,
		from(#ffffff),
		color-stop(0.50, #babdd1),
		color-stop(0.50, #6b36cf),
		to(#bbc76d));
	-moz-border-radius: 0px;
	-webkit-border-radius: 0px;
	border-radius: 0px;
	border: 0px solid #6d8000;
	-moz-box-shadow:
		0px 1px 3px rgba(000,000,000,0.5),
		inset 0px 0px 2px rgba(255,255,255,1);
	-webkit-box-shadow:
		0px 1px 3px rgba(000,000,000,0.5),
		inset 0px 0px 2px rgba(255,255,255,1);
	box-shadow:
		0px 1px 3px rgba(000,000,000,0.5),
		inset 0px 0px 2px rgba(255,255,255,1);
	text-shadow:
		0px -1px 0px rgba(000,000,000,0.2),
		0px 1px 0px rgba(255,255,255,0.4);
}
</style>
{!! Form::open(array('url' => 'autor/salvar')) !!}
<p>
    {!! Form::label('nome_autor', 'Autor') !!}<br/>
    {!! Form::text('nome_autor') !!}<br/></br>


    {!! Form::submit('Enviar',['class'=>'botao']) !!}</br>
</p>
{!! Form::close() !!}
@include('layouts.mensagens_erro')
@stop