<?php

namespace App\Services\Interfaces;

use App\DTOs\SmsApiResponse;
use App\DTOs\SmsWebResponse;
use App\DTOs\User\ChangePasswordRequest;
use App\DTOs\User\UserUpSertRequest;
use Illuminate\Http\Request;

interface IUserService
{
  public function index(Request $request) : SmsWebResponse;

  public function createOrUpdate(UserUpSertRequest $request, $id) : SmsApiResponse;

  public function destroy(Request $request) : SmsApiResponse;

  public function changePassword(ChangePasswordRequest $request) : SmsWebResponse;
}
