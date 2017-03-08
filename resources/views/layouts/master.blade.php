<!doctype html>
<html lang="pt_br">
    <head>
        <meta charset="UTF-8">
        <link href="app.css" rel="stylesheet">
        <title>Livros</title>
        <style>
            .menu-h li {
                display: inline;
                list-style-type: none;
                padding-right: 20px;
            }
            .footer {
                font-size: 0.8em;
            }
            .liv {
                background-image: url('1livros.png');
            }
        </style>
    </head>
    <body>
        @section('menu')
        <div class="top">
            <ul class="menu-h">
                <li>
                    <a href="<?php echo url('/'); ?>">
                        Home
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('/livro'); ?>">
                        Titulo
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('/livro/listar-livros'); ?>">
                        Listar
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('/livro/novo'); ?>">
                        Novo Livro
                    </a>
                </li>
            </ul>
        </div>    
        @stop
        @yield('menu')
        <hr/>
        <h1>Livros</h1>
        <hr/>
        <div>
            @yield('conteudo')
        </div>
        <hr/>
    </body>
</html>