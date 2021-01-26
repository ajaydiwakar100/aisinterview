<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Category::create([
            'name' => 'Appliances',
            'image' => 'Appliances.jpg',
        ]);

        Category::create([
            'name' => 'Clothing',
            'image' => 'Clothing.jpg',

        ]);

        Category::create([
            'name' => 'Shoes',
            'image' => 'Shoes.jpg',
        ]);

        Category::create([
            'name' => 'Computers',
            'image' => 'computer.jpg',
        ]);

        Category::create([
            'name' => 'TV',
            'image' => 'TV.jpg',
        ]);

        Category::create([
            'name' => 'Apps & Games',
            'image' => 'Apps&Games.jpg',
        ]);

        Category::create([
            'name' => 'Arts,Crafts & Sewing',
            'image' => 'art.jpg',
        ]);

        Category::create([
            'name' => 'Automotive Parts & Accessories',
            'image' => 'AutomotiveParts.jpg',
        ]);

        Category::create([
            'name' => 'Baby Accessories' ,
            'image' => 'BabyAccessories.jpg',
        ]);

        Category::create([
            'name' => 'Beauty & Personal Care',
            'image' => 'Beauty.jpg',
        ]);

        Category::create([
            'name' => 'Books',
            'image' => 'Books.jpg',
        ]);

    }
}
