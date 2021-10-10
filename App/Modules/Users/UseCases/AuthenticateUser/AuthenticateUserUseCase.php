<?php
namespace App\Modules\Users\UseCases\AuthenticateUser;
use App\Exceptions\NotFoundHttpException;
use App\Exceptions\UnauthorizedHttpException;
use App\Modules\Users\Dtos\ICreateUserTokenDTO;
use App\Modules\Users\Repositories\UsersRepository\Implementations\UsersRepository;
use App\Modules\Users\Repositories\UsersTokensRepository\Implementations\UsersTokensRepository;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticateUserUseCase {
    private $usersRepository;
    private $usersTokensRepository;

    public function __construct(
        UsersRepository $usersRepository,
        UsersTokensRepository $usersTokenRepository
    ){
        $this->usersRepository = $usersRepository;
        $this->usersTokensRepository = $usersTokenRepository;
    }

    public function execute(IRequest $requestData){
        $user = $this->usersRepository->findByEmail($requestData->email);

        if(!$user){
            throw new NotFoundHttpException('Não existe usuário cadastrado com esse email');
        }

        $passwordIsMatch = Hash::check($requestData->password, $user->password);

        if(!$passwordIsMatch){
            throw new UnauthorizedHttpException('Senha incorreta');
        }

        $daysTokenExpires = env('JWT_REFRESH_TTL') / 1440;

        $expirationDate = date('Y-m-d H:i:s', strtotime("+{$daysTokenExpires} days"));

        $token = JWTAuth::CustomClaims(['email'=>$user->email])->fromUser($user);

        $data = new ICreateUserTokenDTO(['user_id'=>$user->id, 'token'=>$token, 'expires_date'=>$expirationDate]);

        $this->usersTokensRepository->create($data);

        $session = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $expirationDate,
            'user' => [
                'email'=>$user->email
            ]
        ];

        return $session;
    }
}

