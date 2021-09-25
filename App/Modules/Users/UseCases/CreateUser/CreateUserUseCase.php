<?php
namespace App\Modules\Users\UseCases\CreateUser;

use App\Exceptions\ConflictHttpException;
use App\Modules\Users\Dtos\ICreateUserDTO;
use App\Modules\Users\Models\User;
use App\Modules\Users\Repositories\UsersRepository\Implementations\UsersRepository;
use App\Modules\Users\UseCases\CreateUser\IRequest;

class CreateUserUseCase
{
  private $usersRepository;

  public function __construct(
    UsersRepository $usersRepository
  ){
    $this->usersRepository = $usersRepository;
  }

  public function execute(IRequest $request): User{
    $userEmail = $this->usersRepository->findByEmail($request->email);

    if($userEmail){
        throw new ConflictHttpException('Usuário já cadastrado com esse email');
    }

    $name = $request->name;
    $password = $request->password;
    $email = $request->email;
    $users_role_id = $request->users_role_id;

    $user = new ICreateUserDTO(['name' => $name, 'password'=> $password, 'users_role_id' => $users_role_id, 'email'=> $email]);

    $userCreated =  $this->usersRepository->create($user);

    return $userCreated;

  }
}
