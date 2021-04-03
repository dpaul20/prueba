<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;
use App\ProductImage;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Haremos un Factory
        // factory(Category::class, 5)->create();
        // factory(Product::class, 100)->create();
        // factory(ProductImage::class, 200)->create();

        // Asignar productos a las categorias
        $categories = factory(Category::class, 5)->create();
        $categories->each(function ($category) {
            $products = factory(Product::class, 20)->make();
            $category->products()->saveMany($products);

            //Asignar imagenes a los productos
            $products->each(function ($p) {
                $images = factory(ProductImage::class, 5)->make();
                $p->productImage()->saveMany($images);
            });
        });
        // $users = factory(App\User::class, 3)
        //    ->create()
        //    ->each(function ($u) {
        //         $u->posts()->save(factory(App\Post::class)->make());
        //     });
    }
}
