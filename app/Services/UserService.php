<?php

namespace App\Services;

use App\DTOs\SmsResponse;
use App\DTOs\User\UserUpSertRequest;
use App\Models\User;
use App\Services\Interfaces\IPaginationService;
use App\Services\Interfaces\IUserService;
use Illuminate\Http\Request;

class UserService implements IUserService
{
  private $paginationService;

  public function __construct(IPaginationService $paginationService)
  {
    $this->paginationService = $paginationService;
  }

  public function index(Request $request)
  {
    $res = new SmsResponse;

    $users = User::query();

    // Paginate
    $users = $this->paginationService->paginate($users, $request);

    return $users;
  }

  public function show($id)
  {
    $res = new SmsResponse;

    $user = User::find($id);

    return $user;
  }

  public function store(UserUpSertRequest $request)
  {
    $res = new SmsResponse;

    $user = null;

    return $res;
  }

  public function update(UserUpSertRequest $request, $id)
  {
    $res = new SmsResponse;

    $user = User::find($id);

    return $res;
  }

  public function destroy($id)
  {
    $res = new SmsResponse;

    return $res;
  }
}
