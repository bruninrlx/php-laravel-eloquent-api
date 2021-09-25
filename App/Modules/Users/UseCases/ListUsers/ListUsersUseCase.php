<?php

namespace App\Modules\Users\UseCases\ListUsers;

use App\Exceptions\RecordConflictException;
use App\Modules\Users\Repositories\UsersRepository\Implementations\UsersRepository;
use Symfony\Component\HttpFoundation\Exception\JsonException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ListUsersUseCase{

    protected $usersRepository;

    public function __construct(
        UsersRepository $usersRepository
    ){
        $this->usersRepository = $usersRepository;
    }

    public function execute(){
       return $this->usersRepository->list();
    }
}
