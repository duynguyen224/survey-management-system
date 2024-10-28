<?php

namespace App\Http\Controllers;

use App\DTOs\SmsApiResponse;
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

    public function createOrUpdate(UserUpSertRequest $request)
    {
        $res = $this->userService->createOrUpdate($request);
        
        return $res->toJsonResponse();
    }

    public function destroy(Request $request)
    {
        $res = $this->userService->destroy($request);

        return $res->toJsonResponse();
    }
}
