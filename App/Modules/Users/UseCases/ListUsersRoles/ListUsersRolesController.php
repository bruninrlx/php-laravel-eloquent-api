<?php

use App\Http\Controllers\BaseController;
use App\Modules\Users\UseCases\ListUsersRoles\ListUsersRolesUseCase;
use Illuminate\Http\JsonResponse;

class ListUsersRolesController extends BaseController {

    private $listUsersRolesUseCase;

    public function __construct(
        ListUsersRolesUseCase $listUsersRolesUseCase
    )
    {
        $this->listUsersRolesUseCase = $listUsersRolesUseCase;
    }

    public function handle(): JsonResponse{

        $usersRoles =  $this->listUsersRolesUseCase->execute();

        return response()->json($usersRoles);
    }

}
