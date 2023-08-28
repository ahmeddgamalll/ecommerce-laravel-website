<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>

<body>
    @include('partials.nav')
    <div class="box">
        <h1>User Profile</h1>
        <p class="p-profile">Name: {{ $user->name }}</p>
        <p class="p-profile">Email: {{ $user->email }}</p>
        <p class="p-profile">Type: {{ $user->type }}</p>

    </div>
</body>

</html>
