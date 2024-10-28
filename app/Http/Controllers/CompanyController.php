<?php

namespace App\Http\Controllers;

use App\DTOs\Company\CompanyUpSertRequest;
use App\Models\Company;
use App\Services\Interfaces\ICompanyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CompanyController extends Controller
{
    private $companyService;

    public function __construct(ICompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index(Request $request)
    {
        $res = $this->companyService->index($request);
        $companies = $res->getData();

        return view('company.index', compact('companies'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(CompanyUpSertRequest $request)
    {
        $res = $this->companyService->store($request);

        if ($res->getIsSuccess()) {
            Session::flash('success', $res->getMessage());
            return redirect()->route('companies.index');
        }
    }

    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    public function update(CompanyUpSertRequest $request, Company $company) {
        $res = $this->companyService->update($request, $company);

        if ($res->getIsSuccess()) {
            Session::flash('success', $res->getMessage());
            return redirect()->route('companies.index');
        }
    }

    public function destroy(Request $request)
    {
        $res = $this->companyService->destroy($request);

        if ($res->getIsSuccess()) {
            Session::flash('success', $res->getMessage());
        } else {
            Session::flash('error', $res->getMessage());
        }

        return $res->toJsonResponse();
    }
}
