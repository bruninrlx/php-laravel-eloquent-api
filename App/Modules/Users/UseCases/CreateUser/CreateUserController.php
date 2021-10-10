<?php
namespace App\Modules\Users\UseCases\CreateUser;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Modules\Users\UseCases\CreateUser\CreateUserUseCase;
use App\Modules\Users\UseCases\CreateUser\IRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CreateUserController extends BaseController{
  private $createUserUseCase;

  public function __construct(
    CreateUserUseCase $createUserUseCase
  ){
    $this->createUserUseCase = $createUserUseCase;
  }

  public function handle(Request $request): JsonResponse{
    $requestData = IRequest::fromRequest($request);
    $user = $this->createUserUseCase->execute($requestData);

    return response()->json([
        'message'=>'Usuário criado com sucesso',
        'data'=>$user,
    ], Response::HTTP_CREATED);
  }
}
