<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Manager | @yield('title')</title>
    <link rel="shortcut icon" type="image/png" href="/img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
    <script src="/js/app.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    <header class="sticky-top">
        <div class="header__logo_container">
            <a href="{{ route('home') }}"><img src="/img/logo.png" alt=""> TaskManager</a>
        </div>
        <div class="header__user_container">
            @if (Auth::user())
            <a href="{{ route('task.create') }}">Добавить задание</a>
            <p>{{ Auth::user()->name }}</p>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @else
            <a href="{{ route('login') }}">Войти</a>
            <a href="{{ route('register') }}">Зарегистрироваться</a>
            @endif
        </div>
    </header>

    <main>
        <div class="main_content_block">
            <h1 class="main_content_block__header">@yield('main-content-header')</h1>
            @yield('breadcrumbs')
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('alert'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('alert') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @yield('main-content')
        </div>
    </main>


    <div class="toast-container position-absolute bottom-0 end-0 p-3" id="toast_notification_container">
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="test-toast">
            <div class="toast-header">
                <strong class="me-auto">TaskManager</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
            </div>
            <div class="toast-body">
                Test
            </div>
        </div>
    </div>

    <script>
        window.Echo.channel('test').listen('SendingEmail', (e) => {
            console.log(e);
            var taskId = e.task_notification.id;
            var taskTitle = e.task_notification.title;
            var taskNotification = $('<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="test_toast_'+taskId+'">')
                .append('<div class="toast-header"><strong class="me-auto">TaskManager</strong><button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button></div>')
                .append('<div class="toast-body"><p>Добавлено новое задание <a href="/task/'+taskId+'">'+taskTitle+'</a>!<br>Обновите страницу заданий</p></div>');
            $('#toast_notification_container').append(taskNotification);
            var toast = new bootstrap.Toast(taskNotification);
            toast.show();
        });
    </script>

</body>
</html>
