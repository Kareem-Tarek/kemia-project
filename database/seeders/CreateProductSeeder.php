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
            'meta_description' => json_encode(['en' => 'Black, made in vietnam.' , 'ar' => 'أسود, صنع في فيتنام.']),
            'keywords'         => json_encode(['en' => 'mobile, phone, portable device' , 'ar' => 'موبايل, محمول, جهاز محمول.']),
            'price'            => '5000',
            'discount'         => '0.07',
            // 'image'            => '/assets/images/custom_images/note5.jfif',
            'category_id'      => 1,    // category_id = 1 (Electronics)
        ]);

        $product = Product::create([  // ID = 2
            'title'            => 'iPhone 14 Pro Max',
            'description'      => 'Apple.',
            'meta_description' => 'made in Malaysia.',
            'keywords'         => 'mobile, phone, portable device',
            'price'            => '12000',
            'discount'         => '0.15',
            // 'image'            => '/assets/images/custom_images/iphone-14-pro-max.jpg',
            'category_id'      => 1,    // category_id = 1 (Electronics)
        ]);

        $product = Product::create([  // ID = 3
            'title'            => 'Bedroom Sofa',
            'meta_description' => 'Grey, made in Japan.',
            'keywords'         => 'sleeping, comfort, relaxing',
            'price'            => '4500',
            'discount'         => '0.12',
            // 'image'            => '/assets/images/custom_images/bedroom-sofa.jpg',
            'category_id'      => 2,    // category_id = 2 (Furniture)
        ]);
        $product = Product::create([  // ID = 4
            'title'            => 'Savoy Outdoor Teak Wood Set / 4 People',
            'keywords'         => 'relaxing, outdoor',
            'price'            => '73600',
            'discount'         => '0.38',
            // 'image'            => '/assets/images/custom_images/savoy-outdoor-teak-wood-set-4-people.jpg',
            'category_id'      => 2,    // category_id = 2 (Furniture)
        ]);

        $product = Product::create([  // ID = 5
            'title'            => 'PUBG',
            'description'      => 'The game PUBG (is aka Player Unknown Battle Grounds). Land on strategic locations, loot weapons and supplies, and survive to become the last team standing across various, diverse Battlegrounds. Squad up and join the Battlegrounds for the original Battle Royale experience.',
            'meta_description' => 'Multiplayer system and story mode.',
            'keywords'         => 'game, war, guns, multiplayer',
            'price'            => '800',
            'discount'         => '0',
            // 'image'            => '/assets/images/custom_images/pubg.jfif',
            'category_id'      => 3,    // category_id = 3 (Video Games)
        ]);

        $product = Product::create([  // ID = 6
            'title'            => 'Dying Light',
            'description'      => 'First-person action survival game set in a post-apocalyptic open world overrun by flesh-hungry zombies. Roam a city devastated by a mysterious virus epidemic. Scavenge for supplies, craft weapons, and face hordes of the infected.',
            'meta_description' => 'CO-OP and story mode.',
            'keywords'         => 'game, horror',
            'price'            => '650',
            'discount'         => '0.20',
            // 'image'            => '/assets/images/custom_images/dying-light.jpg',
            'category_id'      => 3,    // category_id = 3 (Video Games)
        ]);

    }
}
