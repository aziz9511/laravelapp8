<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Repositories\user\UserRepository;

class UserController extends Controller
{

    public function __construct()
    {
       // set the model
       $this->model = new UserRepository();
    }

    /**
     * @OA\Get(
     *      path="/api/user",
     *      tags={"Users"},
     *      summary="Get list of user",
     *      description="Returns list of user",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *  )
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $list = $this->model->list();
            $message =  $list ? trans('message success') : trans('message fails');

            $status =  $list ? 1 : 0;

            $response = [
                'data' => $list,
                'message' => $message,
                'status' =>$status
            ];

            return response()->json($response, 200);

        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 401);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *      path="/api/user",
     *      tags={"Users"},
     *      summary="Store user data",
     *      description="Returns user data",
     *      @OA\RequestBody(
     *          @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),

     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),

     *                 @OA\Property(
     *                     property="position",
     *                     type="string"
     *                 ),
     *                 example={
     *                      "name": "string", 
     *                      "email": "string", 
     *                      "password": "string", 
     *                      "position": "string"
     *                 }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $input = $request->all();

            $this->validate($request,[
                'name' => 'required|min:5|max:50',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:5',
                'position' => 'required|min:5',
            ]);

            $store = $this->model->store($input);
            $message =  $store ? trans('message success') : trans('message fails');

            $response = [
                'data' => $store,
                'message' => $message,
                'status' =>1
            ];

            return response()->json($response, 200);

        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 401);

        }
    }


    /**
     * @OA\Get(
     *      path="/api/user/{id}",
     *      tags={"Users"},
     *      summary="Get user information",
     *      description="Returns user data",
     *      @OA\Parameter(
     *          name="id",
     *          description="User ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $detail = $this->model->detail($id);
            $message =  $detail ? trans('message success') : trans('message fails');

            $response = [
                'data' => $detail,
                'message' => $message,
                'status' =>1
            ];

            return response()->json($response, 200);

        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 401);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * @OA\Put(
     *      path="/api/user/{id}",
     *      tags={"Users"},
     *      summary="update user data",
     *      description="Returns user data",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),

     *      @OA\RequestBody(
     *          @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),

     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 ),

     *                 @OA\Property(
     *                     property="position",
     *                     type="string"
     *                 ),
     *                 example={
     *                      "name": "string", 
     *                      "email": "string", 
     *                      "password": "string", 
     *                      "position": "string"
     *                 }
     *             )
     *         )
     *      ),

     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $input = $request->all();

            $this->validate($request,[
                'name' => 'required|min:5|max:50',
                'email' => 'required|email',
                'password' => 'required|min:5',
            ]);

            $update = $this->model->update($id,$input);
            $message =  $update ? trans('message success') : trans('message fails');

            $response = [
                'data' => $update,
                'message' => $message,
                'status' =>1
            ];

            return response()->json($response, 200);

        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 401);

        }
    }


    /**
     * @OA\Delete(
     *      path="/api/user/{id}",
     *      tags={"Users"},
     *      summary="delete user data",
     *      description="Returns user data",
     *      @OA\Parameter(
     *          name="id",
     *          description="User id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),

     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        try {

            $delete = $this->model->delete($id);
            $message =  $delete ? trans('message success') : trans('message fails');

            $response = [
                'data' => $delete,
                'message' => $message,
                'status' =>1
            ];

            return response()->json($response, 200);

        } catch (\Exception $e) {

            return response()->json($e->getMessage(), 401);

        }
    }
}
