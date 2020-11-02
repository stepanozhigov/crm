<?php


namespace App\Services\Auth;


use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserRepository
{

    public function create(array $data): User
    {
        $user =  new User($data);
        $user->password = Hash::make($data['password']);
        $user->status = User::STATUS_ACTIVE;
        $user->save();

        return $user;
    }

    public function edit(array $data, User $user): User
    {
        $user->fill($data);
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        }
        $user->save();

        return $user;
    }

}
