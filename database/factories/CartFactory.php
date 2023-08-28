<?php

namespace Database\Factories;

use App\Models\cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CartFactory extends Factory
{
    protected $model = cart::class;

    public function definition()
    {
        $user = User::inRandomOrder()->first();
        if (!$user) {
            $user = User::factory()->create();
        }

        $categories = [
            'Home & Kitchen',
            'Beauty & Personal Care',
            'Clothing, Shoes & Jewelry',
            'Toys & games',
            'Electronics',
            'Sports & outdoors',
            'Office Supplies'
        ];

        $category = $categories[array_rand($categories)];

        return [
            'user_id' => $user->id,
            'category' => $category,
            'name' => Str::limit($this->faker->name(), 15),
            'description' => Str::limit($this->faker->text(), 60),
            'price' => $this->faker->numberBetween(100, 800),
            'picture' => function (array $attributes) use ($category) {
                $photoFiles = Storage::files('public/products/' . $category);

                if (!empty($photoFiles)) {
                    $randomPhoto = $this->faker->randomElement($photoFiles);
                    $photoName = Str::afterLast($randomPhoto, '/');
                    return 'products/' . $category . '/' . $photoName;
                }

                return 'default.png';
            },
        ];
    }
}
