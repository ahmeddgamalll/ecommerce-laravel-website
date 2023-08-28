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
        <h1>Search Results</h1>

        <form action="{{ route('products.search') }}" method="GET" class="search-form">
            <input type="text" name="query" placeholder="Search for products" class="search-input">
            <button type="submit" class="search-button">Search</button>
        </form>

        @if(count($products) > 0)
        @foreach($products as $product)
        <a href="{{ route('product.product', $product) }}">
            <div class="box">
                <img class="image" src="{{ asset('storage/' . $product->picture) }}" />

                <h4 class="title">{{ $product->name }}</h4>

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

                <h4 class="price">{{ $product->price }}$</h4>
            </div>
        </a>
        @endforeach

    </div>
    @else
    <p>No products found.</p>
    @endif
    </div>

</body>

</html>
