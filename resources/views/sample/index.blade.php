@extends('layouts.main-layout')

@section('title', 'Sample list')

@section('content')
    <section class="d-flex justify-content-between align-items-center">
        <x-page-title title="Sample list" />
        <div class="d-flex gap-1">
            <x-input-search id="inp-search" name="inp-search" placeholder="Search ..." />
            <x-button url="#" label="Add new" icon='<i class="fa-solid fa-plus me-1"></i>' />
        </div>
    </section>

    <section class="sms-search">
        <p class="my-4">Filter</p>
        <div class="d-flex gap-3">
            <div class="me-4">
                <span class="fw-bold">Some text: </span>
                <x-pill-filter href="#" isActive="{{ true }}" label="Abc" />
                <x-pill-filter href="#" isActive="{{ false }}" label="Def" />
                <x-pill-filter href="#" isActive="{{ false }}" label="Xyz" />
            </div>
            <div>
                <span class="fw-bold">Some text: </span>
                <x-pill-filter href="#" isActive="{{ true }}" label="Abc" />
                <x-pill-filter href="#" isActive="{{ false }}" label="Def" />
                <x-pill-filter href="#" isActive="{{ false }}" label="Xyz" />
            </div>
        </div>
    </section>

    <section class="mt-4 text-end">
        <x-button url="{{ route('sample.create') }}" label="Go to detail"
            icon='<span class="tf-icons bx bx-pie-chart-alt bx-18px"></span>' />
    </section>

    <section class="mt-4">
        <div class="table-responsive text-nowrap">
            <table class="table table-hover table-borderless">
                <thead>
                    <tr>
                        <th>
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck3"
                                checked="">
                        </th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>
                            <x-trash-icon />
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck3"
                                checked="">
                        </td>
                        <td>
                            <x-pill-status colorClass="orange" label="orange" />
                        </td>
                        <td>
                            <x-email-icon-text text="admin@gmail.com" />
                        </td>
                        <td>
                            <x-email-icon-text text="2024.10.18" />
                        </td>
                        <td>
                            <x-dropdown-menu>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                    Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                    Delete</a>
                            </x-dropdown-menu>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck3"
                                checked="">
                        </td>
                        <td>
                            <x-pill-status colorClass="black" label="orange" />
                        </td>
                        <td>
                            <x-email-icon-text text="admin@gmail.com" />
                        </td>
                        <td>
                            <x-email-icon-text text="2024.10.18" />
                        </td>
                        <td>
                            <x-dropdown-menu>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                    Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                    Delete</a>
                            </x-dropdown-menu>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck3"
                                checked="">
                        </td>
                        <td>
                            <x-pill-status colorClass="secondary-orange" label="Secondary orange" />
                        </td>
                        <td>
                            <x-email-icon-text text="admin@gmail.com" />
                        </td>
                        <td>
                            <x-email-icon-text text="2024.10.18" />
                        </td>
                        <td>
                            <x-dropdown-menu>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                    Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                    Delete</a>
                            </x-dropdown-menu>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck3"
                                checked="">
                        </td>
                        <td>
                            <x-pill-status colorClass="secondary-gray" label="Secondary gray" />
                        </td>
                        <td>
                            <x-email-icon-text text="admin@gmail.com" />
                        </td>
                        <td>
                            <x-email-icon-text text="2024.10.18" />
                        </td>
                        <td>
                            <x-dropdown-menu>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                    Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                    Delete</a>
                            </x-dropdown-menu>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection
