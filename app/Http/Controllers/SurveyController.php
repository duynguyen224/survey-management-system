<?php

namespace App\Http\Controllers;

use App\DTOs\Survey\SurveyUpSertRequest;
use App\Models\Survey;
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

    public function store(SurveyUpSertRequest $request)
    {
        $res = $this->surveyService->store($request);

        if ($res->getIsSuccess()) {
            Session::flash('success', $res->getMessage());
            return redirect()->route('companies.index');
        }
    }

    public function edit(Survey $survey)
    {
        return view('survey.edit', compact('survey'));
    }

    public function update(SurveyUpSertRequest $request, Survey $survey) {
        $res = $this->surveyService->update($request, $survey);

        if ($res->getIsSuccess()) {
            Session::flash('success', $res->getMessage());
            return redirect()->route('companies.index');
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
