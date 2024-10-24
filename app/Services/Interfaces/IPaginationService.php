<?php

namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

interface IPaginationService
{
  public function paginate(Builder $query, Request $request);
}
