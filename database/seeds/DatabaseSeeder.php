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
        factory('App\Business\OrderProduct', 3)->create();
        factory('App\Business\Product', 4)->create([
            'product_category_id' => 1,
        ]);
    }
}
