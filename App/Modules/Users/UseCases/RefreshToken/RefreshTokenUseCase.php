<?php
namespace App\Modules\Users\UseCases\RefreshToken;

use App\Exceptions\NotFoundHttpException;
use App\Modules\Users\Dtos\ICreateUserTokenDTO;
use App\Modules\Users\Repositories\UsersRepository\Implementations\UsersRepository;
use App\Modules\Users\Repositories\UsersTokensRepository\Implementations\UsersTokensRepository;
use Tymon\JWTAuth\Facades\JWTAuth;

class RefreshTokenUseCase {
    private $usersTokensRepository;
    private $usersRepository;

    public function __construct(
        UsersTokensRepository $usersTokensRepository,
        UsersRepository $usersRepository
    )
    {
        $this->usersTokensRepository = $usersTokensRepository;
        $this->usersRepository = $usersRepository;
    }

    public function execute(string $token) {
        $payload = json_decode(JWTAuth::setToken($token)->getPayload());

        $user_id = $payload->sub;
        $email = $payload->email;

        $userTokens = $this->usersTokensRepository->findByUserIdAndRefreshToken($user_id, $token);

        if(!$userTokens){
            throw new NotFoundHttpException('Refresh Token não encontrado');
        }

        $refreshToken = JWTAuth::refresh($token);

        $daysTokenExpires = env('JWT_REFRESH_TTL') / 1440;

        $expirationDate = date('Y-m-d H:i:s', strtotime("+{$daysTokenExpires} days"));

        $data = new ICreateUserTokenDTO(['user_id'=>$user_id, 'token'=>$refreshToken, 'expires_date'=>$expirationDate]);

        $this->usersTokensRepository->create($data);

        $session = [
            'refresh_token' => $refreshToken,
            'token_type' => 'bearer',
            'expires_in' => $expirationDate,
            'user' => [
                'email'=>$email
            ]
        ];

        return $session;
    }
}
