<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=lexend-deca:400,500,600" rel="stylesheet" />


    @vite(['resources/css/app.scss', 'resources/js/app.ts'])
</head>

<body>
    @if ($name && $age)
        <h1>Hello {{ $name }}, thanks for telling me you are {{ $age }} years old</h1>
    @else
        <h1>Hello user, please send name and age in query params, eg. localhost/?name=DW&age=11</h1>
    @endif
</body>

</html>
