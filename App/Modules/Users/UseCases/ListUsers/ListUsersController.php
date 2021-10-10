<?php
namespace App\Modules\Users\UseCases\ListUsers;

use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;

class ListUsersController extends BaseController {
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
