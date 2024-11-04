<?php

namespace App\Services;

use App\DTOs\SmsApiResponse;
use App\DTOs\SmsWebResponse;
use App\DTOs\Survey\SurveyUpSertRequest;
use App\Enums\HttpStatusCode;
use App\Models\Survey;
use App\Models\SurveyDetail;
use App\Services\Interfaces\IPaginationService;
use App\Services\Interfaces\ISurveyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyService implements ISurveyService
{
  private $paginationService;

  public function __construct(IPaginationService $paginationService)
  {
    $this->paginationService = $paginationService;
  }

  public function index(Request $request): SmsWebResponse
  {
    $res = new SmsWebResponse;

    $surveys = Survey::where('agency_id', Auth::user()->agency_id);

    // Paginate
    $surveys = $this->paginationService->paginate($surveys, $request);

    // Prepare response
    $res = $res->setIsSuccess(true)
      ->setMessage(__('survey.Get surveys successfully'))
      ->setData($surveys);

    return $res;
  }

  public function createOrUpdate(SurveyUpSertRequest $request, $id): SmsApiResponse
  {
    $res = new SmsApiResponse;

    $data = $request->all();
    $title = $data['title'];
    $questions = $data['questions'];
    $agencyId = Auth::user()->agency_id;
    if ($id == 0) { // Case create
      $survey = Survey::create([
        'title' => $title,
        'agency_id' => $agencyId,
      ]);

      // Add SurveyDetail
      foreach ($questions as $question) {
        SurveyDetail::create([
          'question_title' => $question['title'],
          'question_description' => $question['description'],
          'question_type' => $question['type'],
          'question_number' => $question['number'],
          'survey_id' => $survey->id
        ]);
      }

      $res =  $res->setMessage(__('survey.Store survey successfully'));
    } else { // Case update
      dd('update');

      $res =  $res->setMessage(__('survey.Update survey successfully'));
    }

    // Prepare response
    $res = $res->setIsSuccess(true)
      ->setStatusCode(HttpStatusCode::OK->value)
      ->setData($survey);

    return $res;
  }

  public function destroy(Request $request): SmsApiResponse
  {
    $res = new SmsApiResponse;

    $data = $request->all();
    $surveyIds = $data['recordIds'] ?? null;

    $arrCompanyIds = explode(",", $surveyIds);

    if (!empty($arrCompanyIds)) {
      Survey::whereIn('id', $arrCompanyIds)->delete();

      $res = $res->setIsSuccess(true)
        ->setStatusCode(HttpStatusCode::OK->value)
        ->setMessage(__('survey.Delete survey(s) successfully'));
    } else {
      $res = $res->setStatusCode(HttpStatusCode::BAD_REQUEST)
        ->setMessage('survey.Survey not found');
    }

    return $res;
  }
}
