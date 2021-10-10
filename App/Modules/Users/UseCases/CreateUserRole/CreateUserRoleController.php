<?php
namespace App\Modules\Users\UseCases\CreateUserRole;

use App\Http\Controllers\BaseController;
use App\Modules\Users\UseCases\CreateUserRole\CreateUserRoleUseCase;
use App\Modules\Users\UseCases\CreateUserRole\IRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CreateUserRoleController extends BaseController {
    private $createUserRoleUseCase;

    public function __construct(
        CreateUserRoleUseCase $createUserRoleUseCase
    )
    {
        $this->createUserRoleUseCase = $createUserRoleUseCase;
    }


    public function handle(Request $request): JsonResponse{
        $requestData = IRequest::fromRequest($request);

        $userRole =  $this->createUserRoleUseCase->execute($requestData);

        return response()->json([
            'message'=>'Grupo de usuário criado com sucesso',
            'data'=>$userRole,
        ], Response::HTTP_CREATED);
    }
}
