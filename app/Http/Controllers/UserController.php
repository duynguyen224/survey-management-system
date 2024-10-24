<?php

namespace App\Http\Controllers;

use App\DTOs\User\UserUpSertRequest;
use App\Services\Interfaces\IUserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $users = $this->userService->index($request);

        return view('user.index', compact('users'));
    }

    public function show($id)
    {
        $res = $this->userService->show($id);

        return $res;
    }

    public function store(UserUpSertRequest $request)
    {
        $res = $this->userService->store($request);

        return $res->toJsonResponse();
    }

    public function update(UserUpSertRequest $request, $id)
    {
        $res = $this->userService->update($request, $id);

        return $res->toJsonResponse();
    }

    public function destroy($id)
    {
        $res = $this->userService->destroy($id);

        return $res->toJsonResponse();
    }
}
