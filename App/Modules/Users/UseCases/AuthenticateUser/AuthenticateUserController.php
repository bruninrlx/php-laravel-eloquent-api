<?php
namespace App\Modules\Users\UseCases\AuthenticateUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Users\UseCases\AuthenticateUser\AuthenticateUserUseCase;
use App\Modules\Users\UseCases\AuthenticateUser\IRequest;

class AuthenticateUserController extends Controller {
   private $authenticateUserUseCase;

   public function __construct(
       AuthenticateUserUseCase $authenticateUserUseCase
   )
   {
    $this->authenticateUserUseCase = $authenticateUserUseCase;
   }

    public function handle(Request $request){
        $requestData = IRequest::fromRequest($request);

        $session = $this->authenticateUserUseCase->execute($requestData);

        return response()->json($session, 201);
    }
}

