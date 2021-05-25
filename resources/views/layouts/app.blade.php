<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/app.css">
        
    @yield('head')
</head>
<body>
    @include('includes/navigation')
    @include('includes/navigation-mobile')

    <main>
        @yield('content')
    
        @include('includes/footer')
    </main>

    <script src="/js/app.js"></script>
    @yield('scripts')
</body>
</html>