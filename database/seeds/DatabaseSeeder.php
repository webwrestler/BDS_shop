<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 7)->create();

        $categories = Category::all();

        factory(Product::class, 31)
            ->create()
            ->each(function ($product) use($categories) {
                $product->categories()->saveMany($categories);
            });
    }
}
