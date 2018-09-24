<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserRepository;

class UserController extends Controller
{
    protected $user;

    function __construct(UserRepository $user)
    {
        $this->user=$user;
    }

    public function create(Request $request){
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users|email',
                'password' => 'required'
            ]);
            $user_data=$request->all();
            return response(['id'=>$this->user->create($user_data)],200);
        }
        catch(\Exception $e){
            return response($e->getMessage(),400);
        }    	
    }

    public function update(Request $request){
        try {
            $validatedData = $request->validate([
                'user_id' => 'required'
            ]);
            $user_data=$request->all();
            return response(['result'=>$this->user->update($user_data)],200);
        }
        catch(\Exception $e){
            return response($e->getMessage(),400);
        }
    }

    public function delete(Request $request){
        try {
            $validatedData = $request->validate([
                'user_id' => 'required'
            ]);
            return response(['result'=>$this->user->delete($request->user_id)],200);
        }
        catch(\Exception $e){
            return response($e->getMessage(),400);
        }
    	
    }

    public function getUserById(Request $request){
        try {
            $validatedData = $request->validate([
                'user_id' => 'required'
            ]);
            return response(['result'=>$this->user->getUserById($request->user_id)],200);
        }
        catch(\Exception $e){
            return response($e->getMessage(),400);
        }
    }
}
