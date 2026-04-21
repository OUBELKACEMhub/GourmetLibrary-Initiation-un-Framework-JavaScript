<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $category = Category::first();

        Book::create([
            'title' => 'Les Meilleures Recettes de Pâtes',
            'slug' => Str::slug('Les Meilleures Recettes de Pâtes'),
            'chef_name' => 'Chef Giovanni',
            'description' => 'Un guide complet pour maîtriser la cuisine italienne.',
            'category_id' => $category->id,
            'borrow_count' => 15,
            'is_damaged' => false,
        ]);

        Book::create([
            'title' => 'Cuisine Asiatique Facile',
            'slug' => Str::slug('Cuisine Asiatique Facile'),
            'chef_name' => 'Chef Lin',
            'description' => 'Découvrez les bases de la cuisine asiatique.',
            'category_id' => $category->id,
            'borrow_count' => 8,
            'is_damaged' => false,
        ]);

        Book::create([
            'title' => 'Secrets de la Pâtisserie',
            'slug' => Str::slug('Secrets de la Pâtisserie'),
            'chef_name' => 'Chef Pierre',
            'description' => 'Apprenez les techniques de la pâtisserie française.',
            'category_id' => $category->id,
            'borrow_count' => 20,
            'is_damaged' => false,
        ]);

        Book::create([
            'title' => 'Healthy Vegetarian Cooking',
            'slug' => Str::slug('Healthy Vegetarian Cooking'),
            'chef_name' => 'Chef Anna',
            'description' => 'Des recettes végétariennes simples et saines.',
            'category_id' => $category->id,
            'borrow_count' => 5,
            'is_damaged' => false,
        ]);

        Book::create([
            'title' => 'Street Food Around the World',
            'slug' => Str::slug('Street Food Around the World'),
            'chef_name' => 'Chef Marco',
            'description' => 'Explorez les plats de rue populaires du monde.',
            'category_id' => $category->id,
            'borrow_count' => 12,
            'is_damaged' => false,
        ]);

        Book::create([
            'title' => 'Traditional Moroccan Recipes',
            'slug' => Str::slug('Traditional Moroccan Recipes'),
            'chef_name' => 'Chef Amina',
            'description' => 'Un voyage dans la cuisine marocaine traditionnelle.',
            'category_id' => $category->id,
            'borrow_count' => 18,
            'is_damaged' => false,
        ]);
    }
}