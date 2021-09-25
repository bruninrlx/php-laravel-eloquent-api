<?php
namespace App\Modules\Users\Repositories\UsersRepository\Implementations;

use App\Modules\Users\Models\User;
use App\Modules\Users\Dtos\ICreateUserDTO;
use App\Modules\Users\Repositories\UsersRepository\IUsersRepository;
use Illuminate\Database\Eloquent\Collection;

class UsersRepository implements IUsersRepository {


  public function create(ICreateUserDTO $user): User {
    $user = User::create(
        [
         'name'=>$user->name,
         'email'=>$user->email,
         'password'=>bcrypt($user->password),
         'users_role_id'=>$user->users_role_id
        ]
    );

    return $user;
  }

  public function list(): Collection{
    return User::all();
  }

  public function findByEmail(string $email): User | null {
    return User::where('email', $email)->first();
  }

  public function findById(int $id): User | null {
    return User::find($id);
  }
}

?>
