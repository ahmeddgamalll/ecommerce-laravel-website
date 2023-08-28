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
    <div class="container">

        <form method="post" action="{{ route('User.Login.login') }}">
            @csrf
            <h3>Log In</h3><br>
            @error('email')
            {{ $message }}
            @enderror
            <input type="email" name="email" placeholder="Email" class="input"><br>
            <input type="password" name="password" placeholder="Password" class="input"><br>
            <input type="submit" value="Log In" name='log' class='button'>
        </form>
    </div>
    </div>


</body>

</html>
