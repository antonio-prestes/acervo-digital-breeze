<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Acervo Digital</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<x-header></x-header>
<x-user-card :user="$user"></x-user-card>
<x-collection-list :collection="$collection" :categories="$categories"></x-collection-list>

</body>
</html>