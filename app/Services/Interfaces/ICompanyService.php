<?php

namespace App\Services\Interfaces;

use App\DTOs\Company\CompanyUpSertRequest;
use App\DTOs\SmsApiResponse;
use App\DTOs\SmsWebResponse;
use App\Models\Company;
use Illuminate\Http\Request;

interface ICompanyService
{
  public function index(Request $request) : SmsWebResponse;

  public function store(CompanyUpSertRequest $request) : SmsWebResponse;

  public function update(CompanyUpSertRequest $request, Company $company) : SmsWebResponse;

  public function destroy(Request $request) : SmsApiResponse;
}
