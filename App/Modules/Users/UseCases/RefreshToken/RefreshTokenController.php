<?php
namespace App\Modules\Users\UseCases\RefreshToken;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Modules\Users\UseCases\RefreshToken\RefreshTokenUseCase;

class RefreshTokenController extends BaseController {

    private $refreshTokenUseCase;

    public function __construct(
      RefreshTokenUseCase $refreshTokenUseCase
    )
    {
      $this->refreshTokenUseCase = $refreshTokenUseCase;
    }


    public function handle(){
        $token = JWTAuth::getToken();
        $session = $this->refreshTokenUseCase->execute($token);

        return response()->json($session, 201);
    }
}
