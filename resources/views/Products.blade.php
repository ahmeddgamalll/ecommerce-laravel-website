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
        <h3 class='text'>Products added</h3>

        @foreach($products as $product)
        <div class="box">
            <img class="image" src="{{ asset('storage/' . $product->picture) }}" />
            <form method="get" action="{{ route('Product.update.index', $product) }}">
                <label for="{{ $product->id . 'update'}}" class="label-edit"><i class="label-edit ">update</i></label>
                <input type="submit" value="edit" name='edit' id="{{ $product->id . 'update'}}" class='subb'>
            </form>
            <form action="{{ route('Product.deleteProduct' , $product) }}" method="post">
                @method('DELETE')
                @csrf
                <label for="{{ $product->id . 'delete'}}" class="label-delete"><i class="label-delete">delete</i></label>
                <input type="submit" value="delete" name='deletee' id="{{ $product->id . 'delete'}}" class='subb'>
            </form>
            <h4 class="title">{{ $product->name }}</h4>
            <h4 class="price">{{ $product->price }}$</h4>
        </div>
        @endforeach
    </div>
</body>

</html>
