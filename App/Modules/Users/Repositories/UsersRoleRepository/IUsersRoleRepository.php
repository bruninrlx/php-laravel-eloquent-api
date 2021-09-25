<?php
namespace App\Modules\Users\Repositories\UsersRoleRepository;
use App\Modules\Users\Dtos\ICreateUserRoleDTO;
use App\Modules\Users\Models\Role;
use Illuminate\Database\Eloquent\Collection;

interface IUsersRoleRepository {
    function create(ICreateUserRoleDTO $userRole): Role;
    function find(): Collection;
}
