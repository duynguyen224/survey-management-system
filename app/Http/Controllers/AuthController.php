<?php

namespace App\Http\Controllers;

use App\DTOs\Login\LoginRequest;
use App\Services\Interfaces\IAuthService;

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

    public function logout()
    {
        $res = $this->authService->logout();
        return redirect()->route('auth.login');
    }
}
