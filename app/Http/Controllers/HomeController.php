<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Repositories\user\UserRepository;

class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // set the model
        $this->model = new UserRepository();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $list = $this->model->list();
        
        $response = [
            'dataUser' => $list,
        ];

        return view('admin.pages.home',$response);
    }
}
