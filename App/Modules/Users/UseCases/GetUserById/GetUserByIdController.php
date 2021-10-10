<?php
namespace App\Modules\Users\UseCases\GetUserById;
use App\Http\Controllers\BaseController;
use App\Modules\Users\UseCases\GetUserById\GetUserByIdUseCase;
use App\Modules\Users\UseCases\GetUserById\IRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class GetUserByIdController extends BaseController {

    private $getUserByIdUseCase;

    public function __construct(
        GetUserByIdUseCase $getUserByIdUseCase
    )
    {
        $this->getUserByIdUseCase = $getUserByIdUseCase;
    }

    public function handle($id): JsonResponse{
        $parsedId = (int)$id;
        $requestId = IRequest::fromRequest($parsedId);
        var_dump($requestId);
        $user = $this->getUserByIdUseCase->execute($requestId);

        return response()->json([
            'message'=>'Usuário retornado com sucesso ',
            'data'=>$user,
        ], Response::HTTP_OK);
    }
}
