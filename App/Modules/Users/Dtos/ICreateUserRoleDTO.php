<?php
namespace App\Modules\Users\Dtos;

use Spatie\DataTransferObject\DataTransferObject;

class ICreateUserRoleDTO extends DataTransferObject
{
  public ?int $id;
  public string $name;
}

