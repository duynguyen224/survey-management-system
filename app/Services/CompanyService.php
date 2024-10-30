<?php

namespace App\Services;

use App\DTOs\Company\CompanyUpSertRequest;
use App\DTOs\SmsApiResponse;
use App\DTOs\SmsWebResponse;
use App\Enums\HttpStatusCode;
use App\Models\Company;
use App\Services\Interfaces\ICompanyService;
use App\Services\Interfaces\IPaginationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyService implements ICompanyService
{
  private $paginationService;

  public function __construct(IPaginationService $paginationService)
  {
    $this->paginationService = $paginationService;
  }

  public function index(Request $request): SmsWebResponse
  {
    $res = new SmsWebResponse;

    $companies = Company::where('agency_id', Auth::user()->agency_id);

    // Paginate
    $companies = $this->paginationService->paginate($companies, $request);

    // Prepare response
    $res = $res->setIsSuccess(true)
      ->setMessage(__('company.Get companies successfully'))
      ->setData($companies);

    return $res;
  }

  public function store(CompanyUpSertRequest $request): SmsWebResponse
  {
    $res = new SmsWebResponse;

    $data = $request->all();

    $company = Company::create([
      'name' => $data['name'],
      'person_in_charge_name' => $data['person_in_charge_name'],
      'person_in_charge_email' => $data['person_in_charge_email'],
      'postal_code' => $data['postal_code'],
      'prefecture' => $data['prefecture'],
      'address' => $data['address'],
      'building_floor' => $data['building_floor'],
      'agency_id' => Auth::user()->agency_id
    ]);

    // Prepare response
    $res = $res->setIsSuccess(true)
      ->setMessage(__('company.Store company successfully'))
      ->setData($company);

    return $res;
  }

  public function update(CompanyUpSertRequest $request, Company $company): SmsWebResponse
  {
    $res = new SmsWebResponse;

    $data = $request->all();

    $company = $company->update([
      'name' => $data['name'],
      'person_in_charge_name' => $data['person_in_charge_name'],
      'person_in_charge_email' => $data['person_in_charge_email'],
      'postal_code' => $data['postal_code'],
      'prefecture' => $data['prefecture'],
      'address' => $data['address'],
      'building_floor' => $data['building_floor'],
      'agency_id' => Auth::user()->agency_id
    ]);

    // Prepare response
    $res = $res->setIsSuccess(true)
      ->setMessage(__('company.Update company successfully'))
      ->setData($company);

    return $res;
  }

  public function destroy(Request $request): SmsApiResponse
  {
    $res = new SmsApiResponse;

    $data = $request->all();
    $companyIds = $data['recordIds'] ?? null;

    $arrCompanyIds = explode(",", $companyIds);

    if (!empty($arrCompanyIds)) {
      Company::whereIn('id', $arrCompanyIds)->delete();

      $res = $res->setIsSuccess(true)
        ->setStatusCode(HttpStatusCode::OK->value)
        ->setMessage(__('company.Delete company(s) successfully'));
    } else {
      $res = $res->setStatusCode(HttpStatusCode::BAD_REQUEST)
        ->setMessage('company.Company not found');
    }

    return $res;
  }
}
