<?php
namespace App\Modules\Users\UseCases\AuthenticateUser;
use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class IRequest extends DataTransferObject{

    public string $email;
    public string $password;

    public static function fromRequest(Request $request): IRequest{
        return new static([
            'email'=>$request->input('email'),
            'password'=>$request->input('password')
        ]);
    }
}
