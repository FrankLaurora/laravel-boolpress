<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['HTML', 'CSS', 'JavaScript', 'Vue JS', 'PHP', 'Laravel', 'SQL'];

        foreach($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->slug = strtolower(Str::of($newCategory->name)->slug('-'));
            $newCategory->save();
        }
    }
}
