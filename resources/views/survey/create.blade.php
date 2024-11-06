@extends('layouts.main-layout')

@section('title', 'Create survey')

@section('breadcrumb')
    <x-breadcrumb>
        <a href="{{ route('surveys.index') }}">List</a>
        <span>></span>
        <span>Create</span>
    </x-breadcrumb>
@endsection

@section('content')
    <x-pages.page-header>
        <x-pages.page-title title="Create survey" />
    </x-pages.page-header>

    <x-pages.page-body>
        <form id="formCreateOrUpdateSurvey" action="{{ route('surveys.createOrUpdate', ['id' => 0]) }}">

            <div class="mb-4 row">
                <label for="title" class="col-2 col-form-label">Survey title</label>
                <div class="col-10">
                    <input class="form-control" type="text" name="title" id="title" placeholder="Enter survey title">
                </div>
            </div>

            <hr>

            <div class="sms-question-container px-5">
                {{-- Hidden item for copy --}}
                {{-- <x-survey.question-card-single-choice $extraClass='hidden-question-card-single-choice d-none'/>
                <x-survey.question-card-multiple-choice $extraClass='hidden-question-card-multiple-choice d-none'/>
                <x-survey.question-card-free-description $extraClass='hidden-question-card-free-description d-none'/> --}}

                @for ($i = 1; $i < 2; $i++)
                    <x-survey.question-card-single-choice />
                    {{-- <x-survey.question-card-multiple-choice />
                    <x-survey.question-card-free-description /> --}}
                @endfor
            </div>

            <div class="d-flex justify-content-center gap-1 mb-5">
                <x-button-icon id="btnAddMoreQuestion" icon='<i class="fa-solid fa-plus me-1"></i>' label="Add QS" />
            </div>
        </form>
    </x-pages.page-body>

    <x-pages.page-footer>
        <div class="d-flex justify-content-center gap-1 mb-3">
            <button id="btnSubmitSurvey" type="button" class="btn btn-primary px-5">Register</button>
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
    <script src="{{ asset('sms/js/survey/form-create-update.js') }}"></script>
@endsection
