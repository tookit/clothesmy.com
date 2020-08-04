<?php

namespace Tests\Feature;

use App\Models\CMS\Slider as Model;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;

class SliderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testView()
    {

        $item = factory(Model::class)->create();
        $response = $this->actingAs($this->makeAdmin())->get('/api/cms/slider/'.$item->id);
        $response->assertStatus(JsonResponse::HTTP_OK);


    }


    public function testList()
    {
        $response = $this->actingAs($this->makeAdmin())->get('/api/cms/slider');
        $response->assertStatus(JsonResponse::HTTP_OK);
    }


    public function testCreate()
    {

        $item = factory(Model::class)->make();
        $data = $item->getAttributes();
        $response = $this->actingAs($this->makeAdmin())->post('/api/cms/slider',$data);
        $response->assertStatus(JsonResponse::HTTP_CREATED);

    }

    public function testUpdate()
    {

        $item = factory(Model::class)->create();
        $data = [
            'name' => 'test'.uniqid(),
        ];
        $response = $this->actingAs($this->makeAdmin())->put('/api/cms/slider/'.$item->id,$data);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testDelete()
    {

        $item = factory(Model::class)->create();
        $response = $this->actingAs($this->makeAdmin())->delete('/api/cms/slider/'.$item->id);
        $response->assertStatus(JsonResponse::HTTP_OK);

    }

    public function testNanmeRequiredRule()
    {

        $item = factory(Model::class)->make();
        $data = $item->getAttributes();
        $response = $this->actingAs($this->makeAdmin())->post('/api/cms/slider',array_merge($data,['name'=>null]));
        $response->assertStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertSee('The name field is required.');

    }

}
