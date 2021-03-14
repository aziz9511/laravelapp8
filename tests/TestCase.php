<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function responseSuccess()
    {
        $response = [
            'status', 
            'message', 
            'data' => [
                'user_id',
                'name',
                'status',
                'position',
            ],
        ];
        return $response;
    }

    /**
     * response error equal auction
     */
    public function responseErrorEqual()
    {
        $response = [
            'status' => 0,
            'message' => 'message fails',
            'data' => []
        ];
        return $response;
    }
}
