<?php

namespace App\Http\Repositories\user;

use App\Http\Repositories\user\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
    public function list()
    {
        $data = User::select('id as user_id','name','status','position')
            ->where('status','active')
            ->get();

        return $data;
    }

    public function detail($id)
    {
        $data = User::select('id as user_id','name','status','position')->find($id);

        return $data;
    }

    public function store($params)
    {
        $insertData = array();
        $insertData['name'] = $params['name'];
        $insertData['email'] = $params['email'];
        $insertData['password'] = bcrypt($params['password']);
        $insertData['position'] = $params['position'];

        $data = User::create($insertData);

        return $data;
    }

    public function update($id,$params)
    {
        $updateData = array();
        $updateData['name'] = $params['name'];
        $updateData['email'] = $params['email'];
        $updateData['password'] = bcrypt($params['password']);
        $updateData['position'] = $params['position'];

        $data = User::find($id)->update($updateData);

        return $data;
    }

    public function delete($id)
    {
        $updateData = array();
        $updateData['status'] = 'inactive';

        $data = User::find($id)->update($updateData);

        return $data;
    }
}