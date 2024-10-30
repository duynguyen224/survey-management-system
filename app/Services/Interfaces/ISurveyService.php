<?php

namespace App\Services\Interfaces;

use App\DTOs\SmsApiResponse;
use App\DTOs\SmsWebResponse;
use App\DTOs\Survey\SurveyUpSertRequest;
use App\Models\Survey;
use Illuminate\Http\Request;

interface ISurveyService
{
  public function index(Request $request) : SmsWebResponse;

  public function store(SurveyUpSertRequest $request) : SmsWebResponse;

  public function update(SurveyUpSertRequest $request, Survey $survey) : SmsWebResponse;

  public function destroy(Request $request) : SmsApiResponse;
}
