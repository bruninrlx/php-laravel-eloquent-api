<?php

namespace App\Modules\Users\UseCases\CreateUser;

use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

final class IRequest extends DataTransferObject
{
  public string $name;
  public string $password;
  public string $email;
  public int $users_role_id;

  public static function fromRequest(Request $request): IRequest
  {
    return new static([
      'name' => $request->input('name'),
      'password' => $request->input('password'),
      'email' => $request->input('email'),
      'users_role_id' => $request->input('users_role_id'),
    ]);
  }
}
