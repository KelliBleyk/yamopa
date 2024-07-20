@php
    $appName = 'YAMoPa';
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($title) ? "$title - $appName" : $appName }}</title>
</head>

<body>
    <header style="display: flex; align-items: center; justify-content: space-between;">
        <h1><a href="/">Recently Searched Movies</a></h1>
        @include('components.search')
    </header>
    <main>@yield('content')</main>
    <footer></footer>
</body>

</html>
