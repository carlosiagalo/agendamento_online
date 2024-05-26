<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/scripts.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- <h1>Teste</h1>
    <img src="/img/banner.jpg" alt=""> -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="/img/agendamento.png" alt="Logo">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="/" class="nav-link">Serviços</a></li>
                    <li class="nav-item"><a href="/services/create" class="nav-link">Criar Serviços</a></li>
                    @auth
                    <li class="nav-item"><a href="/dashboard" class="nav-link">Meus serviços</a></li>
                    <li class="nav-item">
                        <form action="/logout" method="post">
                            @csrf
                            <a href="/logout" class="nav-link"
                             onclick="event.preventDefault();
                                        this.closest('form').submit();">Sair</a>
                        </form>
                    </li>
                    @endauth
                    @guest
                    <li class="nav-item"><a href="/login" class="nav-link">Entrar</a></li>
                    <li class="nav-item"><a href="/register" class="nav-link">Cadastrar</a></li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
    <main>

        <div class="row">
            @if(session('msg'))
            <div class="msg">{{session('msg')}}</div>
            @endif

        </div>


        @yield('content')
    </main>

    <footer>
        <p>Agendamento Online &copy; 2024</p>
    </footer>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>