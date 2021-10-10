<?php
namespace App\Modules\Users\Repositories\UsersTokensRepository;

use App\Modules\Users\Dtos\ICreateUserTokenDTO;
use App\Modules\Users\Models\UsersTokens;

interface IUsersTokensRepository {
    function create(ICreateUserTokenDTO $data): UsersTokens;
    function deleteById(int $id): void;
    function findByUserIdAndRefreshToken(int $id, string $token): UsersTokens | null;
}
