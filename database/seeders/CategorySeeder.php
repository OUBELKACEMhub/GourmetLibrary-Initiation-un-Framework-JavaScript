<?php

namespace Database\Seeders;


namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Pâtisserie Française',
            'Cuisine du Monde',
            'Sans Gluten',
            'Végétarien',
            'Recettes de Chefs'
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat,
                'slug' => Str::slug($cat) 
            ]);
        }
    }
}
