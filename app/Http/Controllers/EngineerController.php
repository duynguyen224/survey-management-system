<?php

namespace App\Http\Controllers;

use App\DTOs\Engineer\EngineerUpSertRequest;
use App\DTOs\Survey\SurveySendInBulkRequest;
use App\Services\Interfaces\IEngineerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EngineerController extends Controller
{
    private $engineerService;

    public function __construct(IEngineerService $engineerService)
    {
        $this->engineerService = $engineerService;
    }

    public function index(Request $request)
    {
        $res = $this->engineerService->index($request);
        $engineers = $res->getData()['engineers'];
        $surveys = $res->getData()['surveys'];

        return view('engineer.index', compact('engineers', 'surveys'));
    }

    public function createOrUpdate(EngineerUpSertRequest $request, $id)
    {
        $res = $this->engineerService->createOrUpdate($request, $id);

        if ($res->getIsSuccess()) {
            Session::flash('success', $res->getMessage());
        } else {
            Session::flash('error', $res->getMessage());
        }

        return $res->toJsonResponse();
    }

    public function destroy(Request $request)
    {
        $res = $this->engineerService->destroy($request);

        if ($res->getIsSuccess()) {
            Session::flash('success', $res->getMessage());
        } else {
            Session::flash('error', $res->getMessage());
        }

        return $res->toJsonResponse();
    }

    public function sendSurveyInBulk(SurveySendInBulkRequest $request){
        $res = $this->engineerService->sendSurveyInBulk($request);

        if ($res->getIsSuccess()) {
            Session::flash('success', $res->getMessage());
        } else {
            Session::flash('error', $res->getMessage());
        }

        return $res->toJsonResponse();
    }
}
