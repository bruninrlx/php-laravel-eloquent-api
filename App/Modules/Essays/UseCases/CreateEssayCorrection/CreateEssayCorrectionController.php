<?php
namespace App\Modules\Essays\UseCases\CreateEssayCorrection;

use App\Http\Controllers\BaseController;
use App\Modules\Essays\UseCases\CreateEssayCorrection\CreateEssayCorrectionUseCase;
use App\Modules\Essays\UseCases\CreateEssayCorrection\IRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CreateEssayCorrectionController extends BaseController {

    private $createEssayCorrectionUseCase;

    public function __construct(
        CreateEssayCorrectionUseCase $createEssayCorrectionUseCase
    ){
        $this->createEssayCorrectionUseCase = $createEssayCorrectionUseCase;
    }

    public function handle(Request $request, $id){
        $parsedId = (int)$id;
        $requestData = IRequest::fromRequest($request, $parsedId);

        $essay_correction = $this->createEssayCorrectionUseCase->execute($requestData);

        return response()->json([
            'message'=>'Usuário criado com sucesso',
            'data'=>$essay_correction,
        ], Response::HTTP_CREATED);
    }
}
