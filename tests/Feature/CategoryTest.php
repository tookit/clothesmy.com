<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;
use App\Models\CMS\Category;

class CategoryTest extends TestCase
{


    use DatabaseTransactions;

    protected $faker;


    public function testList()
    {

        $response = $this->actingAs($this->makeAdmin())->get('/api/cms/category');
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testCreate()
    {

        $item = factory(Category::class)->make();
        $data = $item->getAttributes();
        $response = $this->actingAs($this->makeAdmin())->post('/api/cms/category',$data);
        $response->assertStatus(JsonResponse::HTTP_CREATED);

    }

    public function testUpdate()
    {

        $item = factory(Category::class)->create();
        $data = [
            'name' => 'test'.uniqid(),
            'description' => 'test'
        ];
        $response = $this->actingAs($this->makeAdmin())->put('/api/cms/category/'.$item->id,$data);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testDelete()
    {

        $item = factory(Category::class)->create();
        $response = $this->actingAs($this->makeAdmin())->delete('/api/cms/category/'.$item->id);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }


}
