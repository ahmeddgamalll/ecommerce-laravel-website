<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function getInfos(product $product)
    {
        return view('Product', compact('product'));
    }

    public function getCategoriesProducts(Request $request)
    {
        $products = product::all()->where('category', '=', $request->category);
        return view('homepage', compact('products'));
    }

    public function AddProductsIndex()
    {
        return  view('addProducts');
    }
    public function AddProducts(Request $request)
    {
        $data = $request->except(['_token', 'picture']);
        $data['user_id'] = session('user')->id;

        $category = $request->input('category');
        $image = $request->file('picture');

        if ($image) {
            $imageName = $this->generateUniqueFileName($image);
            $imagePath = 'products/' . $category . '/' . $imageName;
            Storage::put($imagePath, file_get_contents($image));
            $data['picture'] = $imagePath;
        }

        Product::create($data);

        return redirect()->route('homePage')->with('success', 'Product added successfully.');
    }


    private function generateUniqueFileName($file)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = Str::random(40) . '.' . $extension;
        return $fileName;
    }
    // public function AddProducts(Request $request)
    // {
    //     $data = $request->post();
    //     $data['user_id'] = session('user')->id;
    //     $data['picture'] = $request->file('picture')->store('products', 'public');
    //     product::create($data);
    //     return to_route('homePage');
    // }

    function getProducts()
    {
        $products = product::where('user_id', '=', session('user')->id)->get();

        return view('Products', compact('products'));
    }

    public function delete(product $product)
    {
        $product->delete();
        return back();
    }

    public function  updateIndex(product $product)
    {
        return view('updateProduct', compact('product'));
    }

    public function update(product $product, Request $request)
    {
        $validatedData = $request->post();
        $validatedData['user_id'] = session('user')->id;
        $validatedData['picture'] = $request->file('picture')->store('products', 'public');
        $product->fill($validatedData)->save();
        return to_route('product.Products');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get();

        return view('search', compact('products'));
    }
}
