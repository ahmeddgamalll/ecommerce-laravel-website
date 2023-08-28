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
    <div class="shoeContainer">
        <div class="imgContainer">
            <img src="{{ asset('storage/' . $product->picture)  }}" alt="unavailable" />
        </div>
        <div class="infoContainer">
            <h1 class="ShoeName">{{ $product->name }}</h1>
            <h4 class="Shoecategory">
                {{ $product->Category }}
            </h4>
            <h4 class="description">{{ $product->description }}</h4>
            <h3 class="ShoePrice"> {{ $product->price }} $ </h3>
            <br>
            <div class="buttonsContainer">
                @if(session('user'))

                <form action="{{ route('cart.add',$product) }}" method="post">
                    @csrf

                    <input type="submit" value="Add to cart" class="button">

                </form>
                @else

                <form action="{{ route('User.Login.index') }}" method="get">

                    <input type="submit" value="Add to cart" class="button">
                </form>
                @endif
            </div>
        </div>
    </div>
    </div>
</body>

</html>
