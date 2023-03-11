<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acervo Digital</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <!-- Share JS -->
    <script src="{{ asset('js/share.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</head>
<body>
<x-header></x-header>
<x-user-card :user="$user"></x-user-card>
<x-collection-item :item="$item" :shareButtons="$shareButtons"></x-collection-item>
<x-footer></x-footer>
</body>
</html>
