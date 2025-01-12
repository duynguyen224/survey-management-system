<?php

namespace App\Http\Controllers;

use App\DTOs\Survey\SurveyUpSertRequest;
use App\Services\Interfaces\ISurveyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SurveyController extends Controller
{
    private $surveyService;

    public function __construct(ISurveyService $surveyService)
    {
        $this->surveyService = $surveyService;
    }

    public function index(Request $request)
    {
        $res = $this->surveyService->index($request);
        $surveys = $res->getData();

        return view('survey.index', compact('surveys'));
    }

    public function create()
    {
        return view('survey.create');
    }

    public function edit($id)
    {
        $res = $this->surveyService->edit($id);

        $survey = $res->getData()['survey'];
        $surveyDetails = $res->getData()['surveyDetails'];

        return view('survey.edit', compact('survey', 'surveyDetails'));
    }

    public function detail($id)
    {
        $res = $this->surveyService->edit($id);

        $survey = $res->getData()['survey'];
        $surveyDetails = $res->getData()['surveyDetails'];

        return view('survey.detail', compact('survey', 'surveyDetails'));
    }

    public function createOrUpdate(SurveyUpSertRequest $request, $id)
    {
        $res = $this->surveyService->createOrUpdate($request, $id);

        if ($res->getIsSuccess()) {
            Session::flash('success', $res->getMessage());
            return $res->toJsonResponse();
        }
    }

    public function destroy(Request $request)
    {
        $res = $this->surveyService->destroy($request);

        if ($res->getIsSuccess()) {
            Session::flash('success', $res->getMessage());
        } else {
            Session::flash('error', $res->getMessage());
        }

        return $res->toJsonResponse();
    }
}
