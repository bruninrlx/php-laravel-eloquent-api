<?php
namespace App\Modules\Users\UseCases\ListUsersRoles;

use App\Modules\Users\Repositories\UsersRoleRepository\Implementations\UsersRoleRepository;
use Illuminate\Database\Eloquent\Collection;

class ListUsersRolesUseCase {
    private $usersRoleRepository;

    public function __construct(
        UsersRoleRepository $usersRoleRepository
    )
    {
        $this->$usersRoleRepository = $usersRoleRepository;
    }

    public function execute(): Collection{
        return $this->usersRoleRepository->list();
    }

}
