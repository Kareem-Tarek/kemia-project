<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CreateCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([  // ID = 1
            'name'      => 'Electronics',   // main category
            'status'    => 'available',
            'parent_id' => null,
        ]);

        $category = Category::create([ // ID = 2
            'name'      => 'Furnitures',   // main category
            'status'    => 'available',
            'parent_id' => null,
        ]);

        $category = Category::create([ // ID = 3
            'name'      => 'Video Games',   // main category
            'status'    => 'available',
            'parent_id' => null,
        ]);

        $category = Category::create([  // ID = 4
            'name'      => 'Mobiles',
            'status'    => 'available',
            'parent_id' => 1,   // parent_id/Sub-category of ID: = 1 (Electronics)
        ]);

        $category = Category::create([ // ID = 5
            'name'      => 'Laptops',
            'status'    => 'available',
            'parent_id' => 1,   // parent_id/Sub-category of ID: = 1 (Electronics)
        ]);

        $category = Category::create([ // ID = 6
            'name'      => 'Playstation',
            'status'    => 'available',
            'parent_id' => 1,   // parent_id/Sub-category of ID: = 1 (Electronics)
        ]);

        $category = Category::create([ // ID = 7
            'name'      => 'Chairs',
            'status'    => 'available',
            'parent_id' => 2,   // parent_id/Sub-category of ID: = 2 (Furniture)
        ]);

        $category = Category::create([ // ID = 8
            'name'      => 'Tables',
            'status'    => 'available',
            'parent_id' => 2,   // parent_id/Sub-category of ID: = 2 (Furniture)
        ]);

        $category = Category::create([ // ID = 9
            'name'      => 'Sofas',
            'status'    => 'available',
            'parent_id' => 2,   // parent_id/Sub-category of ID: = 2 (Furniture)
        ]);

        $category = Category::create([ // ID = 10
            'name'      => 'Action',
            'status'    => 'available',
            'parent_id' => 3,   // parent_id/Sub-category of ID: = 3 (Video Games)
        ]);

        $category = Category::create([ // ID = 11
            'name'      => 'Horror',
            'status'    => 'unavailable',
            'parent_id' => 3,   // parent_id/Sub-category of ID: = 3 (Video Games)
        ]);

        $category = Category::create([ // ID = 12
            'name'      => 'Strategy',
            'status'    => 'unavailable',
            'parent_id' => 3,   // parent_id/Sub-category of ID: = 3 (Video Games)
        ]);
    }
}
