<?php

namespace App\Services;

use App\DTOs\SmsApiResponse;
use App\DTOs\SmsWebResponse;
use App\DTOs\User\UserUpSertRequest;
use App\Enums\HttpStatusCode;
use App\Models\User;
use App\Services\Interfaces\IPaginationService;
use App\Services\Interfaces\IUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserService implements IUserService
{
  private $paginationService;

  public function __construct(IPaginationService $paginationService)
  {
    $this->paginationService = $paginationService;
  }

  public function index(Request $request): SmsWebResponse
  {
    $res = new SmsWebResponse;

    $users = User::where('agency_id', Auth::user()->agency_id);

    // Paginate
    $users = $this->paginationService->paginate($users, $request);

    // Prepare response
    $res = $res->setIsSuccess(true)
      ->setMessage(__('user.Get users successfully'))
      ->setData($users);

    return $res;
  }

  public function createOrUpdate(UserUpSertRequest $request): SmsApiResponse
  {
    $res = new SmsApiResponse;

    $data = $request->all();
    $id = $data['userId'];
    $name = $data['name'];
    $email = $data['email'];

    if ($id == 0) { // Case create
      $user = User::create([
        'name' => $name,
        'email' => $email,
        'password' => bcrypt('123456'),
        'agency_id' => Auth::user()->agency_id,
      ]);

      $res = $res->setIsSuccess(true)
        ->setStatusCode(HttpStatusCode::CREATED->value)
        ->setMessage(__('user.Create user successfully'))
        ->setData($user);
    } else { // Case update
      $user = User::find($id);

      if (!$user) {
        $res = $res->setIsSuccess(false)
          ->setStatusCode(HttpStatusCode::NOT_FOUND->value)
          ->setMessage(__('user.User not found'));
      } else {
        $user->update([
          'name' => $name,
          'email' => $email,
          'password' => bcrypt('123456')
        ]);

        $res = $res->setIsSuccess(true)
          ->setStatusCode(HttpStatusCode::OK->value)
          ->setMessage(__('user.Update user successfully'))
          ->setData($user);
      }
    }

    return $res;
  }

  public function destroy(Request $request): SmsApiResponse
  {
    $res = new SmsApiResponse;

    $data = $request->all();
    $userIds = $data['recordIds'] ?? null;

    $arrUserIds = explode(",", $userIds);

    if (!empty($arrUserIds)) {
      User::whereIn('id', $arrUserIds)->delete();

      $res = $res->setIsSuccess(true)
        ->setStatusCode(HttpStatusCode::OK->value)
        ->setMessage(__('user.Delete user(s) successfully'));
    } else {
      $res = $res->setStatusCode(HttpStatusCode::BAD_REQUEST)
        ->setMessage('user.User not found');
    }

    return $res;
  }

  public function changePassword(Request $request): SmsApiResponse
  {
    $res = new SmsApiResponse;

    return $res;
  }
}
