<?php

namespace App\Http\Repositories\user;

Interface UserInterface {
    public function list();
    public function detail($id);
    public function store($params);
    public function update($id,$params);
}