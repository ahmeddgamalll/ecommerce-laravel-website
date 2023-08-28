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
    <div class="contain">
        <h3 class='text'>Cart :</h3>

        @foreach($cart as $product)

        <div class="box">
            <img class="image" src="{{ asset('storage/' . $product->picture) }}" />
            <h4 class="title">{{ $product->name }}</h4>
            <h4 class="price">{{ $product->price }}$</h4>
        </div>



        @endforeach
    </div>


</body>

</html>
