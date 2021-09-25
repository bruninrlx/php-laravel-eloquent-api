<?php
namespace App\Modules\Users\UseCases\CreateUserRole;

use App\Modules\Users\Dtos\ICreateUserRoleDTO;
use App\Modules\Users\Models\Role;
use App\Modules\Users\Repositories\UsersRoleRepository\Implementations\UsersRoleRepository;

class CreateUserRoleUseCase {

    private $usersRoleRepository;

    function __construct(
        UsersRoleRepository $usersRoleRepository
    )
    {
        $this->usersRoleRepository = $usersRoleRepository;
    }

    public function execute(IRequest $request): Role{

        $name = $request->name;

        $role = new ICreateUserRoleDTO([
            'name'=>$name
        ]);

        $userRole = $this->usersRoleRepository->create($role);

        return $userRole;
    }
}
