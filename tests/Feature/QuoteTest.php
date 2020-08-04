<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;
use App\Models\Mall\Quote;

class QuoteTest extends TestCase
{


    use DatabaseTransactions;

    protected $faker;




    public function testCreate()
    {

        $item = factory(Quote::class)->make();
        $data = $item->getAttributes();
        $response = $this->actingAs($this->makeAdmin())->post('/api/quote',$data);
        $response->assertStatus(JsonResponse::HTTP_CREATED);

    }



}
