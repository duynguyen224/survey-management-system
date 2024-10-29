@extends('layouts.main-layout')

@section('title', 'Create company')

@section('breadcrumb')
    <x-breadcrumb>
        <a href="{{ route('companies.index') }}">List</a>
        <span>></span>
        <span>Create</span>
    </x-breadcrumb>
@endsection

@section('content')
    <x-pages.page-header>
        <x-pages.page-title title="Create company"/>
    </x-pages.page-header>

    <x-pages.page-body>
        <form action="{{ route('companies.store') }}" method="POST">
            @csrf
            <div class="mb-4 row">
                <label for="name" class="col-md-2 col-form-label">Company name</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}">
                    <x-validation-message field="name" />
                </div>
            </div>
            <div class="mb-4 row">
                <label for="person_in_charge_name" class="col-md-2 col-form-label">PIC name</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" id="person_in_charge_name" name="person_in_charge_name"
                        value="{{ old('person_in_charge_name') }}">
                    <x-validation-message field="person_in_charge_name" />
                </div>
            </div>
            <div class="mb-4 row">
                <label for="person_in_charge_email" class="col-md-2 col-form-label">PIC email</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" id="person_in_charge_email" name="person_in_charge_email"
                        value="{{ old('person_in_charge_email') }}">
                    <x-validation-message field="person_in_charge_email" />
                </div>
            </div>
            <div class="mb-4 row">
                <label for="postal_code" class="col-md-2 col-form-label">postal code</label>
                <div class="col-md-3">
                    <input class="form-control" type="text" id="postal_code" name="postal_code"
                        value="{{ old('postal_code') }}">
                    <x-validation-message field="postal_code" />
                </div>
            </div>
            <div class="mb-4 row">
                <label for="prefecture" class="col-md-2 col-form-label">Prefecture</label>
                <div class="col-md-3">
                    <input class="form-control" type="text" id="prefecture" name="prefecture"
                        value="{{ old('prefecture') }}">
                    <x-validation-message field="prefecture" />
                </div>
            </div>
            <div class="mb-4 row">
                <label for="address" class="col-md-2 col-form-label">Address</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" id="address" name="address" value="{{ old('address') }}">
                    <x-validation-message field="address" />
                </div>
            </div>
            <div class="mb-4 row">
                <label for="building_floor" class="col-md-2 col-form-label">building floor</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" id="building_floor" name="building_floor"
                        value="{{ old('building_floor') }}">
                    <x-validation-message field="building_floor" />
                </div>
            </div>
            <div class="d-flex justify-content-center gap-1">
                <button type="submit" class="btn btn-primary px-5">Register</button>
            </div>
        </form>
    </x-pages.page-body>
@endsection
