<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{	

	/**
    * 	@OA\Info(
    *      version="1.0.0",
    *      title="Api Documentation",
    *      @OA\Contact(
    *          email="aziz8009@gmail.com.com"
    *      ),
    * 	)
    *
    * 	@OA\Server(
    *      url="http://localhost:8000/",
    *      description="API Server"
    * 	)
    *
    */

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
