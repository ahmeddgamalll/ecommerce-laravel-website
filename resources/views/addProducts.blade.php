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
        <form method="post" enctype="multipart/form-data" action="{{ route('Product.addProduct.add') }}">
            @csrf
            <label for="image" class="upload">{{ '___________' }}add an image for your
                product</label> <br>
            <input type="file" name="picture" id="image"><br>
            <label>Product Name</label><br>
            <input type="text" name='name' class='input' placeholder='Product Name'><br>
            <label for="category">Category</label><br>
            <select name="category" id="" class="input">
                <option value="Home & Kitchen">Home & Kitchen</option>
                <option value="Beauty & Personal Car">Beauty & Personal Car</option>
                <option value="Clothing, Shoes & Jewelry">Clothing, Shoes & Jewelry</option>
                <option value="Toys & games">Toys & games</option>
                <option value="Electronics">Electronics</option>
                <option value="Sports & outdoors">Sports & outdoors</option>
                <option value="Office Supplies">Office Supplies</option>

            </select> <br>
            <label>Product Description</label><br>
            <textarea name="description" id="" cols="32" rows="4" placeholder="Product Description"></textarea><br>
            <label>Product Price</label><br>
            <input type="number" name="price" class='input' placeholder="0.00"><br>
            <input type="submit" value="submit" name="sub" class="button">
        </form>
    </div>
</body>

</html>
