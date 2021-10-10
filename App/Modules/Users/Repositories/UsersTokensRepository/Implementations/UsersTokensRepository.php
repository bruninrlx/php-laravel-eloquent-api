<?php
namespace App\Modules\Users\Repositories\UsersTokensRepository\Implementations;
use App\Modules\Users\Dtos\ICreateUserTokenDTO;
use App\Modules\Users\Models\UsersTokens;
use App\Modules\Users\Repositories\UsersTokensRepository\IUsersTokensRepository;

class UsersTokensRepository implements IUsersTokensRepository{
    function create(ICreateUserTokenDTO $data): UsersTokens {
        $userToken = UsersTokens::create([
            'token'=>$data->token,
            'user_id'=>$data->user_id,
            'expires_date'=>$data->expires_date,
        ]);

        return $userToken;
    }

    function deleteById(int $id): void {
        UsersTokens::find($id)->delete();
    }

    function findByUserIdAndRefreshToken(int $id, string $token): UsersTokens | null
    {
        return UsersTokens::where('user_id', $id)->where('token', $token)->first();
    }
}
