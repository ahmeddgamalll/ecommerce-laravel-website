<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
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
        return [
            'user_id' => $user->id,
            'category' => $categories[array_rand($categories)],
            'name' => Str::limit($this->faker->name(), 15),
            'description' => Str::limit($this->faker->text(), 60),
            'price' => fake()->numberBetween(100, 800),
            //'picture' => "products/n17Jqx6grMeaT8Qt1rbdUWCjLyJaBUzs8liOtEvq.png",
            'picture' => function (array $attributes) use ($categories) {
                $category = $attributes['category']; // Use the category name from the attributes
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
