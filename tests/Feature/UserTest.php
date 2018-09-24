<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    public function testUserCreate()
    {
        $response = $this->json('POST', 'api/user', ['name' => 'Teste','email'=>'email10@email.com','password'=>'password']);
        $structure=['id'];
        $response
            ->assertStatus(200)
            ->assertJsonStructure($structure);
    } 

    public function testUserUpdate()
    {
        $response = $this->json('PUT', 'api/user', ['name' => 'Teste 2','email'=>'loxas1@email.com','password'=>'password3','user_id' => '1']);
        $response
            ->assertStatus(200)
            ->assertJson([
                'result' => 1,
            ]);
    }

    public function testUserGet()
    {
        $response = $this->json('GET', 'api/user', ['user_id' => '1']);
        $structure['result']=['id','name','email','email_verified_at','created_at','updated_at'];
        $response
            ->assertStatus(200)
            ->assertJsonStructure($structure);
    }

    public function testUserDelete()
    {
        $response = $this->json('DELETE', 'api/user', ['user_id' => '1']);
        $structure=['id'];
        $response
            ->assertStatus(200)
            ->assertJson([
                'result' => 1,
            ]);
    }

    public function testUserCreateValidation()
    {
        $response = $this->json('POST', 'api/user', ['email'=>'email10@email.com']);
        $response->assertStatus(400);
    } 

    public function testUserUpdateValidation()
    {
        $response = $this->json('PUT', 'api/user', ['name' => 'Teste 2','email'=>'loxas1@email.com','password'=>'password3']);
        $response->assertStatus(400);
    }

    public function testUserGetValidation()
    {
        $response = $this->json('GET', 'api/user');
        $structure['result']=['id','name','email','email_verified_at','created_at','updated_at'];
        $response->assertStatus(400);
    }

    public function testUserDeleteValidation()
    {
        $response = $this->json('DELETE', 'api/user');
        $structure=['id'];
        $response->assertStatus(400);
    }
}
