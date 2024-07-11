<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\News;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Ürünler için örnek veri
        Product::create([
            'name' => 'Örnek Ürün 1',
            'description' => 'Bu bir örnek ürün açıklamasıdır.',
           
        ]);

        Product::create([
            'name' => 'Örnek Ürün 2',
            'description' => 'Bu başka bir örnek ürün açıklamasıdır.',
           
        ]);

        // Haberler için örnek veri
        News::create([
            'title' => 'Örnek Haber 1',
            'content' => 'Bu bir örnek haber içeriğidir.',
        ]);

        News::create([
            'title' => 'Örnek Haber 2',
            'content' => 'Bu başka bir örnek haber içeriğidir.',
        ]);
    }
}