{{-- layout for pages after login (yung mga nasa navbar) - e.g. user accounts, first encounter, audit log --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>AER Health System</title>
    <script>
        // const BASE_PATH = '{{ url("/") }}';
    </script>
    @vite('resources/css/app.css')
    @vite('resources/js/main.js')
</head>

<body {{$attributes->merge(['class' => 'relative font-poppins'])}}>
    <x-navbar />
    {{ $slot }}
</body>

<!-- from node_modules -->
<script src="node_modules/@material-tailwind/html/scripts/tabs.js"></script>
<!-- from cdn -->
<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/tabs.js"></script>
{{-- table with tabs --}}
<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

</html>