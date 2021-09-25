<?php
namespace App\Modules\Users\UseCases\GetUserById;

use App\Modules\Users\Models\User;
use App\Modules\Users\Repositories\UsersRepository\Implementations\UsersRepository;

class GetUserByIdUseCase {

    private $usersRepository;

    function __construct(
        UsersRepository $usersRepository
    )
    {
        $this->usersRepository = $usersRepository;
    }

    function execute(IRequest $request): User{
        return $this->usersRepository->findById($request->id);
    }
}
