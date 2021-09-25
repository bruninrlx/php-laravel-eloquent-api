<?php
namespace App\Modules\Users\UseCases\ListUsers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ListUsersController {
  protected $listUsersUseCase;

  public function __construct(
    ListUsersUseCase $listUsersUseCase
  ){
    $this->listUsersUseCase = $listUsersUseCase;
  }

  public function handle(): JsonResponse {
    $users =  $this->listUsersUseCase->execute();

    return response()->json($users);
  }
}
