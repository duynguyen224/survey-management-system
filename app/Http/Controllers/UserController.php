<?php

namespace App\Http\Controllers;

use App\DTOs\User\ChangePasswordRequest;
use App\DTOs\User\UserUpSertRequest;
use App\Services\Interfaces\IUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $res = $this->userService->index($request);
        $users = $res->getData();

        return view('user.index', compact('users'));
    }

    public function createOrUpdate(UserUpSertRequest $request, $id)
    {
        $res = $this->userService->createOrUpdate($request, $id);

        if ($res->getIsSuccess()) {
            Session::flash('success', $res->getMessage());
        } else {
            Session::flash('error', $res->getMessage());
        }

        return $res->toJsonResponse();
    }

    public function destroy(Request $request)
    {
        $res = $this->userService->destroy($request);

        if ($res->getIsSuccess()) {
            Session::flash('success', $res->getMessage());
        } else {
            Session::flash('error', $res->getMessage());
        }

        return $res->toJsonResponse();
    }

    public function showChangePassword()
    {
        return view('user.change-password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $res = $this->userService->changePassword($request);

        if ($res->getIsSuccess()) {
            Session::flash('success', $res->getMessage());
            return redirect()->route('auth.login');
        } else {
            Session::flash('error', $res->getMessage());
            return redirect()->route('users.showChangePassword');
        }
    }
}
