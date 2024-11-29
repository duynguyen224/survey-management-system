@use(App\Enums\QuestionType)

@extends('layouts.main-layout')

@section('title', 'Detail survey')

@section('breadcrumb')
    <x-breadcrumb>
        <a href="{{ route('surveys.index') }}">List</a>
        <span>></span>
        <span>Detail</span>
    </x-breadcrumb>
@endsection

@section('content')
    <x-pages.page-header>
        <x-pages.page-title title="Detail survey" />
    </x-pages.page-header>

    <x-pages.page-body>

        {{-- Hidden item for copy --}}
        <x-survey.question-card extraClass="d-none" />

        <form id="formCreateOrUpdateSurvey" action="{{ route('surveys.createOrUpdate', ['id' => $survey->id]) }}">
            <div class="mb-4 row">
                <label for="title" class="col-2 col-form-label">Survey title</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="title" id="title" placeholder="Enter survey title"
                        value="{{ $survey->title }}">
                </div>
            </div>

            <hr>

            <div class="sms-question-container px-5">
                @foreach ($surveyDetails as $surveyDetail)
                    <x-survey.question-card id="{{ $surveyDetail->id }}"
                        questionId="{{ $surveyDetail->id }}" 
                        questionType="{{ $surveyDetail->question_type }}"
                        questionNumber="{{ $surveyDetail->question_number }}"
                        questionTitle="{{ $surveyDetail->question_title }}"
                        questionDescription="{{ $surveyDetail->question_description }}"
                        numberOfChoices="{{ $surveyDetail->number_of_choices }}"
                        choices="{{ $surveyDetail->choices }}" />
                @endforeach
            </div>

            <div class="d-flex justify-content-center gap-1 mb-5">
                {{-- <x-button-icon id="btnAddMoreQuestion" icon='<i class="fa-solid fa-plus me-1"></i>' label="Add QS" /> --}}
            </div>
        </form>
    </x-pages.page-body>

    <x-pages.page-footer>
        <div class="d-flex justify-content-center gap-1 mb-3">
            {{-- <button id="btnSubmitSurvey" type="button" class="btn btn-primary px-5">Register</button> --}}
        </div>
    </x-pages.page-footer>

    {{-- Modal confirm delete --}}
    @include('survey.modal-delete-question')

    {{-- Modal validation error --}}
    <x-modals.modal-error-message>
        <p>There is insufficient registration information.</p>
        <p>Please enter all the information.</p>
    </x-modals.modal-error-message>
@endsection

@section('scripts')
    <script src="{{ asset('sms/js/survey/create-update.js') }}"></script>
@endsection
