<?php


namespace App\Services\Auth;


use App\Models\User;


class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $data
     * @return User
     */
    public function createUserByAdminPanel(array $data): User
    {
        $user = $this->userRepository->create($data);

        if (!empty($data['permissions'])) {
            $user->givePermissionTo(array_keys($data['permissions']));
        }

        return $user;
    }

    /**
     * @param array $data
     * @param User $user
     * @return User
     */
    public function editUserByAdminPanel(array $data, User $user): User
    {
        $user = $this->userRepository->edit($data, $user);
        $user->syncPermissions(array_keys($data['permissions'] ?? []));

        return $user;
    }

}
