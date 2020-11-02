<?php

namespace Tests\Unit\User;

use App\Models\User;
use App\Services\Auth\UserService;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public $service;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->service = resolve(UserService::class);
    }

    public function testCreateByAdminPanel()
    {
        $user = $this->service->createUserByAdminPanel([
            'name' => 'Vasya',
            'email' => 'Vasya@test.com',
            'password' => '123456',
            'status' => User::STATUS_ACTIVE
        ]);

        $this->assertTrue($user instanceof User);
        $this->assertDatabaseHas('users', ['name' => 'Vasya','email' => 'Vasya@test.com', 'status' => User::STATUS_ACTIVE]);
    }

    public function testCreateByAdminPanelFail()
    {
        $this->expectException(QueryException::class);

        $user = $this->service->createUserByAdminPanel([
            'name' => 'Vasya',
            'password' => '123456',
            'status' => User::STATUS_ACTIVE
        ]);
    }

    public function testEditByAdminPanel()
    {
        $user = factory(\App\Models\User::class)->create();
        $data = [
            'name' => 'Vasya',
            'email' => 'test@test.com',
            'status' => User::STATUS_ACTIVE
        ];
        $editUser = $this->service->editUserByAdminPanel($data, $user);

        $this->assertTrue($editUser instanceof User);
        $this->assertDatabaseHas('users', $data);
    }

    public function testEditByAdminPanelFail()
    {
        $user = factory(\App\Models\User::class)->create(['email' => 'test@test.com']);
        $data = [
            'email' => 'test@test.com',
            'status' => User::STATUS_ACTIVE
        ];
        $editUser = $this->service->editUserByAdminPanel($data, $user);

        $this->assertTrue($editUser instanceof User);
        $this->assertDatabaseHas('users', $data);
    }


}
