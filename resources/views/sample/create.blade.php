@extends('layouts.main-layout')

@section('title', 'Sample create')

@section('breadcrumb')
    <x-breadcrumb>
        <a href="#">Home</a>
        <span>></span>
        <span>Dashboard</span>
    </x-breadcrumb>
@endsection

@section('content')
    <section>
        <div class="mb-4 row">
            <label for="html5-text-input" class="col-md-2 col-form-label">Text</label>
            <div class="col-md-10">
                <input class="form-control" type="text" value="sneat" id="html5-text-input">
            </div>
        </div>
        <div class="mb-4 row">
            <label for="html5-search-input" class="col-md-2 col-form-label">Search</label>
            <div class="col-md-10">
                <input class="form-control" type="search" value="Search ..." id="html5-search-input">
            </div>
        </div>
        <div class="mb-4 row">
            <label for="html5-email-input" class="col-md-2 col-form-label">Email</label>
            <div class="col-md-10">
                <input class="form-control" type="email" value="john@example.com" id="html5-email-input">
            </div>
        </div>
        <div class="mb-4 row">
            <label for="html5-url-input" class="col-md-2 col-form-label">URL</label>
            <div class="col-md-10">
                <input class="form-control" type="url" value="https://themeselection.com" id="html5-url-input">
            </div>
        </div>
        <div class="mb-4 row">
            <label for="html5-tel-input" class="col-md-2 col-form-label">Phone</label>
            <div class="col-md-10">
                <input class="form-control" type="tel" value="90-(164)-188-556" id="html5-tel-input">
            </div>
        </div>
        <div class="mb-4 row">
            <label for="html5-password-input" class="col-md-2 col-form-label">Password</label>
            <div class="col-md-10">
                <input class="form-control" type="password" value="password" id="html5-password-input">
            </div>
        </div>
        <div class="mb-4 row">
            <label for="html5-number-input" class="col-md-2 col-form-label">Number</label>
            <div class="col-md-10">
                <input class="form-control" type="number" value="18" id="html5-number-input">
            </div>
        </div>
        <div class="mb-4 row">
            <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
            <div class="col-md-10">
                <input class="form-control" type="date" value="2021-06-18" id="html5-date-input">
            </div>
        </div>

        <div class="d-flex justify-content-center gap-1">
            <button type="button" class="btn btn-primary px-5">Register</button>
            <button type="button" class="btn btn-secondary px-5">Cancel</button>
        </div>
    </section>
@endsection
