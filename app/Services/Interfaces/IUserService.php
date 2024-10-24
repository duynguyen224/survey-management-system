<?php

namespace App\Services\Interfaces;

use App\DTOs\User\UserUpSertRequest;
use Illuminate\Http\Request;

interface IUserService
{
  public function index(Request $request);

  public function show($id);

  public function store(UserUpSertRequest $request);

  public function update(UserUpSertRequest $request, $id);

  public function destroy($id);
}
