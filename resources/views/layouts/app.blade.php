<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#00aba9">
    <meta name="theme-color" content="#ffffff">

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
    
        @include('includes/tour-booking-modal')
        @include('includes/fade')
    </main>

    @include('includes/footer')

    <script src="/js/app.js"></script>

    @yield('scripts')
</body>
</html>