<?php

namespace App\Services\Interfaces;

use App\DTOs\SmsApiResponse;
use App\DTOs\SmsWebResponse;
use App\DTOs\Survey\SurveyUpSertRequest;
use Illuminate\Http\Request;

interface ISurveyService
{
  public function index(Request $request) : SmsWebResponse;

  public function edit($id) : SmsWebResponse;

  public function createOrUpdate(SurveyUpSertRequest $request, $id) : SmsApiResponse;

  public function destroy(Request $request) : SmsApiResponse;
}
