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
        <div class="categories">
            <h3 class='text' style="margin: 0px 0 12px">Categories</h3>
            <a href="{{ route('homePage.category','Home & Kitchen') }}" class="buttonCat">Home & Kitchen</a>
            <a href="{{ route('homePage.category','Beauty & Personal Care') }}" class="buttonCat">Beauty & Personal
                Care</a>
            <a href="{{ route('homePage.category','Clothing, Shoes & Jewelry') }}" class="buttonCat">Clothing, Shoes &
                Jewelry</a>
            <a href="{{ route('homePage.category','Toys & games') }}" class="buttonCat">Toys & games</a>
            <a href="{{ route('homePage.category','Electronics') }}" class="buttonCat">Electronics</a>
            <a href="{{ route('homePage.category','Sports & outdoors') }}" class="buttonCat">Sports & outdoors</a>
            <a href="{{ route('homePage.category','Office Supplies') }}" class="buttonCat">Office Supplies</a>

        </div>
        <h3 class='text'>Available Products</h3>

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
</body>

</html>
