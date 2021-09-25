<?php
namespace App\Modules\Users\UseCases\AuthenticateUser;
use App\Exceptions\NotFoundHttpException;
use App\Exceptions\UnauthorizedHttpException;
use App\Modules\Users\Repositories\UsersRepository\Implementations\UsersRepository;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticateUserUseCase {
    private $usersRepository;

    public function __construct(
        UsersRepository $usersRepository
    ){
        $this->usersRepository = $usersRepository;
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

        $token = JWTAuth::fromUser($user);

        $session = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 60,
            'user' => [
                'email'=>$user->email
            ]
        ];

        return $session;
    }
}

