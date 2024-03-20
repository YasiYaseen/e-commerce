<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name'=>'Mobiles'
        ]);
        Category::create([
            'name'=>'Laptops'
        ]);
        Category::create([
            'name'=>'Fashion'
        ]);
        Category::create([
            'name'=>'Perfumes'
        ]);
        Category::create([
            'name'=>'Home Appliances'
        ]);
        Category::create([
            'name'=>'Digital Gadgets'
        ]);
    }
}