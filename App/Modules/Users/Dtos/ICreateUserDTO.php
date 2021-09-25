<?php
namespace App\Modules\Users\Dtos;

use Spatie\DataTransferObject\DataTransferObject;

class ICreateUserDTO extends DataTransferObject
{
  public ?int $id;
  public string $name;
  public string $email;
  public string $password;
  public int $users_role_id;
}

