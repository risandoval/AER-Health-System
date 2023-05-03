<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>AER Health System</title>
    <script>
        const BASE_PATH = '{{ url("/") }}';
    </script>
    @vite('resources/css/app.css')
    @vite('resources/js/main.js')
    @vite('resources/js/toast.js')

</head>

<body>
    <x-navbar/>
    {{ $slot }}
</body>

</html>