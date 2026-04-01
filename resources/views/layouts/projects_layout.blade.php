<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("win-title")</title>
</head>
@vite(['resources/css/app.css', 'resources/js/app.js'])

<body>
    <main class="p-3">
        @yield("main-content")
    </main>
</body>

</html>