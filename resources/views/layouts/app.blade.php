<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>
        @yield('title')
    </title>

    <link rel="preload" href="/fonts/nunito/Nunito-Regular.ttf" as="font" crossorigin />
    <link rel="preload" href="/fonts/nunito/Nunito-SemiBold.ttf" as="font" crossorigin />
    <link rel="preload" href="/fonts/nunito/Nunito-Bold.ttf" as="font" crossorigin />

    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/app.css">
        
    @yield('head')
</head>
<body>
    @include('includes/navigation')
    @include('includes/navigation-mobile')

    <main>
        @yield('content')    
    </main>

    @include('includes/footer')

    <script src="/js/app.js"></script>
    @yield('scripts')
</body>
</html>