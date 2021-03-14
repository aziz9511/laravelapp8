<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    
    /**
     * testList.
     *
     * @return void
     */
    public function testList()
    {
        $this->get('api/user');
        $this->seeStatusCode(200);
        /**
         * get response
         */
        $response = $this->response->getContent();
        $response = json_decode($response, true);

        /**
         * data found
         */
        if($response['status'] == 1) {
            $this->seeJsonStructure($this->responseSuccess());
        } else {
            /**
             * data not found
             */
            $this->seeJsonEquals($this->responseErrorEqual());
        }
    }
}
