<?php
namespace App\Modules\Users\Repositories\UsersRepository;
use App\Modules\Users\Models\User;
use App\Modules\Users\Dtos\ICreateUserDTO;
use Illuminate\Database\Eloquent\Collection;

interface IUsersRepository{
  public function create(ICreateUserDTO $data): User;
  public function list(): Collection;
  public function findByEmail(string $email): User | null;
  public function findById(int $id): User | null;
}

?>
