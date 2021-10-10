<?php
namespace App\Modules\Users\Dtos;

use Illuminate\Support\Facades\Date;
use Spatie\DataTransferObject\DataTransferObject;

class ICreateUserTokenDTO extends DataTransferObject
{
  public ?int $id;
  public int $user_id;
  public string $token;
  public string $expires_date;
}

