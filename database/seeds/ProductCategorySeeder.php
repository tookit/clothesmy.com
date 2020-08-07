<?php

use Illuminate\Database\Seeder;
use App\Models\Mall\Category;

class ProductCategorySeeder extends Seeder
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
                    'name' => 'Rapunzel',
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
        Category::create($categories);

    }
}
