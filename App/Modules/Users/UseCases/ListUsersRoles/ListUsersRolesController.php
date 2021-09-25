<?php

use App\Modules\Users\UseCases\ListUsersRoles\ListUsersRolesUseCase;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;

class ListUsersRolesController {

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
