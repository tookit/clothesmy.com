<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use App\Models\Mall\Category;

class ProductsCategorySeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed product category
        $categories = [
            'name' => 'Cartoon Dress',
            'children' => [
                [
                    'name' => 'Snow White',
                ],

                [
                    'name' => 'Belle',
                ],
                [
                    'name' => 'Elsa',
                ],
                [
                    'name' => 'Anna',
                ],
                [
                    'name' => 'Cinderella',
                ],
                [
                    'name' => 'Aurora',
                ],
                [
                    'name' => 'Sofia',
                ],
                [
                    'name' => 'Moana',
                ],
                [
                    'name' => 'Jasmine',
                ],
                [
                    'name' => 'Other',
                ],
            ],
        ];

    }
}
