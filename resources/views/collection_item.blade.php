<!DOCTYPE html>
<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Share JS -->
<script src="{{ asset('js/share.js') }}"></script>
<head>
    <meta charset="UTF-8">
    <title>Acervo Digital</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<x-header></x-header>
<x-user-card :user="$user"></x-user-card>
<x-collection-item :item="$item" :shareButtons="$shareButtons"></x-collection-item>
<x-footer></x-footer>
</body>
</html>
