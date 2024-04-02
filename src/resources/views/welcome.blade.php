<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- BS5 -->
    <link rel="stylesheet" href="../BS5/main.scss">
    <link rel="stylesheet" href="BS5/main.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div id="app"></div>

    @vite('resources/js/app.js')
</body>

</html>