<?php

namespace App\Model;

use Illuminate\Http\Request;
use App\Model\User;

class UserRepository 
{
    protected $model;

    function __construct(User $model)
    {
        $this->model=$model;
    }

    public function create(array $data){
    	return $this->model->create($data)->id;
    }

    public function update(array $data){
    	$user=$this->model->findOrFail($data['user_id']);
        $user->fill($data);
        $user->save();
        return true;
    }

    public function delete($user_id){
        return $this->model->destroy($user_id);
    }

    public function getUserById($user_id){
    	return $this->model->findOrFail($user_id);
    }
}
