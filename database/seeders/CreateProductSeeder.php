<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class CreateProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::create([  // ID = 1
            'title'            => 'Galaxy Note 5',
            'description'      => 'Samsung.',
            'meta_description' => 'Black, made in vietnam.',
            'keywords'         => 'mobile, phone, portable device',
            'price'            => '5000',
            'discount'         => '0.07',
            'image'            => '/assets/images/custom_images/note5.jfif',
            'category_id'      => 1,    // category_id = 1 (Electronics)
        ]);

        $product = Product::create([  // ID = 1
            'title'            => 'Bedroom Sofa',
            'meta_description' => 'Grey, made in Japan.',
            'keywords'         => 'sleeping, comfort, relaxing',
            'price'            => '4500',
            'discount'         => '0.12',
            'image'            => '/assets/images/custom_images/bedroom-sofa.jpg',
            'category_id'      => 2,    // category_id = 2 (Furniture)
        ]);

        $product = Product::create([  // ID = 2
            'title'            => 'PUBG',
            'description'      => 'The game PUBG (is aka Player Unknown Battle Grounds) War video game has a very good features (icluding "Team-work" & "Solo" gameplay).',
            'meta_description' => 'Multiplayer system and story mode.',
            'keywords'         => 'game, war, guns, multiplayer',
            'price'            => '800',
            'discount'         => '0',
            'image'            => '/assets/images/custom_images/pubg.jfif',
            'category_id'      => 3,    // category_id = 3 (Video Games)
        ]);
    }
}
