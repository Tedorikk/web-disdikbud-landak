<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="font-sans">
    <x-header />
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold">Welcome, Admin!</h1>
        <p class="mt-4">This is the admin dashboard where you can manage articles, tags, and users.</p>
    </div>
    <x-footer />
</body>
</html>
