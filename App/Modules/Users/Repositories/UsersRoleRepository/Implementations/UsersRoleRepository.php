<?php
namespace App\Modules\Users\Repositories\UsersRoleRepository\Implementations;
use App\Modules\Users\Dtos\ICreateUserRoleDTO;
use App\Modules\Users\Models\Role;
use App\Modules\Users\Repositories\UsersRoleRepository\IUsersRoleRepository;
use Illuminate\Database\Eloquent\Collection;

class UsersRoleRepository implements IUsersRoleRepository{

    function create(ICreateUserRoleDTO $user): Role{
        $userRole = Role::create([
            'name'=>$user->name
        ]);

        return $userRole;
    }

    function find(): Collection{
        return Role::all();
    }
}
