<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\OrderProduct::class, 3)->create();
        factory(App\Product::class, 4)->create([
            'product_category_id' => 1,
        ]);
    }
}
