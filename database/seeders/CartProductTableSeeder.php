<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carts = \App\Models\Cart::all();
        $products = \App\Models\Product::all();

        foreach ($carts as $cart) {
            $cart->products()->attach($products->random(rand(1, 5))->pluck('id'));
        }
        
    }
}
