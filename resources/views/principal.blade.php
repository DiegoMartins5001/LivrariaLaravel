<!doctype html>
<html lang="pt_br">
    <head>
        <meta charset="UTF-8">
        <title>Livros</title>
        {!! Html::style('/css/bootstrap.css') !!}
        <link href="{{asset('js/bootstrap.min.js')}}">
        <style>
            .menu-h li {
                display: inline;
                list-style-type: none;
                padding-right: 20px;
                font-size: 20px;
            }
            .footer {
                font-size: 0.8em;
            }
            body {
                width: 960px;
                padding-top: 40px;
            }
            td {
                padding-left: 15px;
                padding-right: 15px;
            }
            h1 {
                text-align: center;
            }
            li {
                text-align: center;
            }
            .alt {
                padding-left: 10px;
                padding-right: 5px;
            }
            .livro  {
                font-size: 18px;
                text-align: right;
            }
            .alerta {
                font-size: 20px;
                color: red;
            }
            .top {
                text-align: center;
            }
            #liv  {
                width: 960px;
                margin: 0 auto;
                text-align:center;
                background-position: top;
                background-image: url('1livros.jpg');
            }
        </style>
    </head>
    <body id="liv">
        @section('menu')
        <nav class="navbar">
            <ul class="menu-h">
                <div class="container">
                    <li class="col-md-1">
                        <a href="<?php echo url('/'); ?>">
                            <text>Home
                        </a>
                    </li>
                    <li class="col-md-2">
                        <a href="{{url('/autor/novo-autor')}}">
                            Novo Autor
                        </a>
                    </li>
                    <li class="col-md-2">
                        <a href="{{url('/autor/listar-autor')}}">
                            Listar Autor
                        </a>
                    </li>
                    <li class="col-md-2">
                        <a href="<?php echo url('/livro/novo'); ?>">
                            Novo Livro
                        </a>
                    </li>
                    <li class="col-md-2">
                        <a href="<?php echo url('/livro/listar-livros'); ?>">
                            Listar Livros
                        </a>
                    </li>
                </div>
            </ul>
        </nav>
        @stop
        @yield('menu')
        <hr/>
        <h1>Livros & Autores</h1>
        <hr/>
        <div>
            @yield('conteudo')
        </div>
        <hr/>
    </body>
</html>