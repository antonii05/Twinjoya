<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Laravel</title>

</head>

<body>
    <div id="app" class="container-fluid"></div>

    @vite('resources/js/app.ts')
</body>

</html>