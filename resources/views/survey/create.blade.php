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
        <form action="{{ route('surveys.store') }}" method="POST" id="formCreateOrUpdateSurvey">
            @csrf
            <div class="mb-4 row">
                <label for="name" class="col-md-2 col-form-label">Survey title</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}">
                    <x-validation-message field="title" />
                </div>
            </div>

            <hr>

            <div class="d-flex justify-content-center gap-1">
                <x-button-icon id="btnAddMoreQuestion" icon='<i class="fa-solid fa-plus me-1"></i>' label="Add QS" />
            </div>
        </form>
    </x-pages.page-body>

    <x-pages.page-footer>
        <div class="d-flex justify-content-center gap-1">
            <button id="btnSubmitSurvey" type="button" class="btn btn-primary px-5">Register</button>
        </div>
    </x-pages.page-footer>

    {{-- Modal validation error --}}
    <x-modals.modal-validation-error>
        <p>There is insufficient registration information.</p>
        <p>Please enter all the information.</p>
    </x-modals.modal-validation-error>
@endsection

@section('scripts')
    <script src="{{ asset('sms/js/survey/create-update.js') }}"></script>
@endsection