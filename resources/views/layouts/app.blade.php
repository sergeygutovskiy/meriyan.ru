<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/app.css">
    
    @yield('head')
</head>
<body>
    <header class="container">
        @yield('header')
    </header>

    <main>
        @yield('content')
    </main>

    <script src="js/app.js"></script>
    @yield('scripts')
</body>
</html>