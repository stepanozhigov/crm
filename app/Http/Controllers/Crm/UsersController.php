<?php

namespace App\Http\Controllers\Crm;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Services\Auth\UserService;
use App\Services\Permission\PermissionService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = User::paginate(20);

        return view('crm.users.index', compact('users'));
    }

    public function create()
    {
        return view('crm.users.create');
    }

    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        $this->userService->createUserByAdminPanel($validated);

        return redirect('users')->with('success', 'Изменения успешно применились!');
    }

    public function edit(User $user)
    {
        return view('crm.users.edit', compact('user'));
    }


    public function update(UserRequest $request, User $user)
    {
        $validated = $request->validated();
        $this->userService->editUserByAdminPanel($validated, $user);

        return redirect('users')->with('success', 'Изменения успешно применились!');
    }

}
