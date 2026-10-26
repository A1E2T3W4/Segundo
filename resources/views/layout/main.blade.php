<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("TESTE")</title>
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <script src="/JS/script.js"></script>
    <link rel="shortcut icon" href="IMG/LOGO.jpeg" type="image/x-icon">

    <!--CSS Bootrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--Fonte gooogle -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

</head>

<body>
    <header>
        <img src="IMG/LOGO.jpeg" alt="" width="50px">
        <nav>

            <ul>
                <li><a href="/">Eventos</a></li>

                @auth
                <li><a href="/dashboard">Meus Eventos</a></li>
                <li><a href="/events/create">Criar Evento</a></li>

                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link">
                            Sair
                        </button>
                    </form>
                </li>
                @endauth

                @guest
                <li><a href="/events/create">Criar Evento</a></li>
                <li><a href="/login">Entrar</a></li>
                <li><a href="/register">Cadastrar</a></li>
                @endguest
            </ul>

        </nav>
    </header>


    <main>
        <div class="container-fluid">
            <div class="row">
                @if(session("msg"))
                <p class="msg"> {{ session("msg") }}</p>
                @endif
                @yield("content")
            </div>
        </div>
    </main>


    <footer>
        <p>Wanandumbo Gruop &copy; 2026</p>
    </footer>

</body>

</html>