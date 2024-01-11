<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js'])
    <title>Shortened-url</title>
</head>
<body>
<main class="container">
    @yield('content')
</main>
{{-- <footer class="container">
    <a href="https://kwork.ru?ref=15574944" target="_blank"><img src="https://cdn-edge.kwork.ru/images/partner/34.jpg" alt="Kwork.ru - услуги фрилансеров от 500 руб."></a>
</footer> --}}
</body>
</html>
