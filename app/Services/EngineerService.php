<?php

namespace App\Services;

use App\DTOs\Engineer\EngineerUpSertRequest;
use App\DTOs\SmsApiResponse;
use App\DTOs\SmsWebResponse;
use App\DTOs\Survey\SurveySendInBulkRequest;
use App\Enums\HttpStatusCode;
use App\Enums\Status;
use App\Enums\UserType;
use App\Models\Survey;
use App\Models\User;
use App\Services\Interfaces\IEngineerService;
use App\Services\Interfaces\IMailService;
use App\Services\Interfaces\IPaginationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EngineerService implements IEngineerService
{
  private $paginationService;
  private $mailService;

  public function __construct(IPaginationService $paginationService, IMailService $mailService)
  {
    $this->paginationService = $paginationService;
    $this->mailService = $mailService;
  }

  public function index(Request $request): SmsWebResponse
  {
    $res = new SmsWebResponse;

    $engineers = User::where('agency_id', Auth::user()->agency_id)
      ->where('type', UserType::ENGINEER->value)
      ->where('status', Status::ACTIVE->value);

    // Paginate
    $engineers = $this->paginationService->paginate($engineers, $request);

    // Get surveys
    $surveys = Survey::where('agency_id', Auth::user()->agency_id)->get();

    // Prepare data
    $data = [
      'engineers' => $engineers,
      'surveys' => $surveys,
    ];

    // Prepare response
    $res = $res->setIsSuccess(true)
      ->setMessage(__('engineer.Get engineers successfully'))
      ->setData($data);

    return $res;
  }

  public function createOrUpdate(EngineerUpSertRequest $request, $id): SmsApiResponse
  {
    $res = new SmsApiResponse;

    $data = $request->all();
    $id = $id;
    $name = $data['name'];
    $email = $data['email'];

    if ($id == 0) { // Case create
      $engineer = User::create([
        'name' => $name,
        'email' => $email,
        'password' => bcrypt('123456'),
        'type' => UserType::ENGINEER->value,
        'agency_id' => Auth::user()->agency_id,
      ]);

      $res = $res->setIsSuccess(true)
        ->setStatusCode(HttpStatusCode::CREATED->value)
        ->setMessage(__('engineer.Create engineer successfully'))
        ->setData($engineer);
    } else { // Case update
      $engineer = User::find($id);

      if (!$engineer) {
        $res = $res->setIsSuccess(false)
          ->setStatusCode(HttpStatusCode::NOT_FOUND->value)
          ->setMessage(__('engineer.Engineer not found'));
      } else {
        $engineer->update([
          'name' => $name,
          'email' => $email,
          'password' => bcrypt('123456')
        ]);

        $res = $res->setIsSuccess(true)
          ->setStatusCode(HttpStatusCode::OK->value)
          ->setMessage(__('engineer.Update engineer successfully'))
          ->setData($engineer);
      }
    }

    return $res;
  }

  public function sendSurveyInBulk(SurveySendInBulkRequest $request): SmsApiResponse
  {
    $res = new SmsApiResponse;

    $data = $request->all();
    $surveyId = $data['surveyId'];
    $surveyResponseDeadline = $data['surveyResponseDeadline'];
    $engineerIds = $data['engineerIds'];

    $survey = Survey::find($surveyId);
    if ($survey) {
      // Send mail in bulk
      // Code goes here
      $this->mailService->sendSurvey('nguyenducduy224.coding@gmail.com', $survey);
    }

    $res = $res->setIsSuccess(true)
      ->setStatusCode(HttpStatusCode::OK->value)
      ->setMessage(__('engineer.Survey was sent successfully'));

    return $res;
  }

  public function destroy(Request $request): SmsApiResponse
  {
    $res = new SmsApiResponse;

    $data = $request->all();
    $engineerIds = $data['recordIds'] ?? null;

    $arrEngineerIds = explode(",", $engineerIds);

    if (!empty($arrEngineerIds)) {
      User::whereIn('id', $arrEngineerIds)->update(['status' => Status::INACTIVE->value]);

      $res = $res->setIsSuccess(true)
        ->setStatusCode(HttpStatusCode::OK->value)
        ->setMessage(__('engineer.Delete engineer(s) successfully'));
    } else {
      $res = $res->setStatusCode(HttpStatusCode::BAD_REQUEST)
        ->setMessage('engineer.Engineer not found');
    }

    return $res;
  }
}
