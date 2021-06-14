<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('/css/admin.css') }}">
    <title>Admin</title>
</head>
<body>
    <div class="container bg-white mt-5" style="width: 400px;">
        @yield('admin')
    </div>
</body>
<script src="{{ mix('/js/app.js') }}"></script>
</html>