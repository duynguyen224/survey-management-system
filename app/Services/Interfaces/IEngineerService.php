<?php

namespace App\Services\Interfaces;

use App\DTOs\SmsApiResponse;
use App\DTOs\SmsWebResponse;
use App\DTOs\Engineer\EngineerUpSertRequest;
use App\DTOs\Survey\SurveySendInBulkRequest;
use Illuminate\Http\Request;

interface IEngineerService
{
  public function index(Request $request) : SmsWebResponse;

  public function createOrUpdate(EngineerUpSertRequest $request, $id) : SmsApiResponse;

  public function sendSurveyInBulk(SurveySendInBulkRequest $request) : SmsApiResponse;

  public function destroy(Request $request) : SmsApiResponse;
}
