<?php

namespace App\Services;

use App\Services\Interfaces\IPaginationService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PaginationService implements IPaginationService
{
  public function paginate(Builder $query, Request $request)
  {
    $queryParams = $request->all();

    // Set default values if no values passed
    $pageIndex = $queryParams['pageIndex'] ?? 1;
    $itemPerPage = $queryParams['itemPerPage'] ?? env('SMS_ITEM_PER_PAGE', 10);
    $sortField = $queryParams['sortField'] ?? env('SMS_SORT_FIELD', 'created_at');
    $sortDirection = $queryParams['sortDirection'] ?? env('SMS_SORT_DIRECTION', 'desc');

    // Apply sorting
    $query->orderBy($sortField, $sortDirection);

    $paginator = $query->paginate($itemPerPage);

    return $paginator;
  }
}
