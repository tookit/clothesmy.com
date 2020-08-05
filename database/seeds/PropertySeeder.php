<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use App\Models\Mall\Property;

class PropertySeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // seed product category
        $props = [
            [
                'name' => 'Color',
                'option' => ['red','blue','green','black','yellow','purple','grey']
            ],
            [
                'name' => 'Size',
                'option' => ['2T','3T','4T','5T','6T','7T','8T','9T','10T']
            ],
            [
                'name' => 'decoration',
                'category' => 'Cartoon Dress',
                'option' => ['appliques','beading','bow','criss-cross','crystal','draped']
            ],
            [
                'name' => 'Pattern Type',
                'option' => ['animal','cartoon','DOT','floral','patchwork','plaid','print']
            ]
        ];
        collect($props)->each(function ($item){
           $model = Property::updateOrCreate(['name'=>$item['name']]);
           foreach ($item['option'] as $value) {
               $model->attachValue($value);
           }

        });

    }
}
