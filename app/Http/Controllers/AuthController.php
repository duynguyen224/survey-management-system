<?php

namespace App\Http\Controllers;

use App\DTOs\Auth\LoginRequest;
use App\DTOs\Auth\ResetPasswordRequest;
use App\Services\Interfaces\IAuthService;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    private $authService;

    public function __construct(IAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $res = $this->authService->login($request);
        if ($res->getIsSuccess()) {
            return redirect()->route('home.index');
        }

        return back()->withErrors(["invalid_credential" => $res->getMessage()])
            ->withInput($request->only('email'));
    }

    public function showResetPassword()
    {
        return view('auth.reset-password');
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $res = $this->authService->resetPassword($request);

        if ($res->getIsSuccess()) {
            Session::flash('success', $res->getMessage());
            return redirect()->route('auth.login');
        } else {
            Session::flash('error', $res->getMessage());
            return redirect()->route('users.showChangePassword');
        }
    }

    public function logout()
    {
        $res = $this->authService->logout();
        return redirect()->route('auth.login');
    }
}
