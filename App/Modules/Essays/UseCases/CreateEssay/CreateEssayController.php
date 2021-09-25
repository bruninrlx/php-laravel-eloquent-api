<?php
namespace App\Modules\Essays\UseCases\CreateEssay;
use Illuminate\Http\Request;
use App\Modules\Essays\UseCases\CreateEssay\CreateEssayUseCase;
use App\Modules\Essays\UseCases\CreateEssay\ValidationRequest;

class CreateEssayController{

    private $createEssayUseCase;

    public function __construct(
        CreateEssayUseCase $createEssayUseCase
    )
    {
        $this->createEssayUseCase = $createEssayUseCase;
    }

    public function handle(Request $request){
        $requestData = ValidationRequest::fromRequest($request);

        return $this->createEssayUseCase->execute($requestData);
    }

}
