@extends('layouts.main-layout')

@section('title', 'Sample list')

@section('content')
    <x-pages.page-header>
        <x-pages.page-title title="Sample list" />
        <div class="d-flex gap-1">
            <x-input-search id="input-search" name="input-search" placeholder="Search ..." />
            <x-button-link href="{{ route('sample.create') }}" label="Add new" icon='<i class="fa-solid fa-plus me-1"></i>' />
        </div>
    </x-pages.page-header>

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
        <x-button-link href="{{ route('sample.create') }}" label="Go to detail"
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
                            <x-calendar-icon-text text="2024-09-09 10:10:10" />
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
                            <x-pill-status colorClass="black" label="Black" />
                        </td>
                        <td>
                            <x-email-icon-text text="admin@gmail.com" />
                        </td>
                        <td>
                            <x-calendar-icon-text text="2024-09-09 10:10:10" />
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
                            <x-calendar-icon-text text="2024-09-09 10:10:10" />
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
                            <x-calendar-icon-text text="2024-09-09 10:10:10" />
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

    <section class="mt-5">
        <h1>Modal</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            Launch modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <i class="fa-solid fa-x icon-button" data-bs-dismiss="modal"></i>
                    </div>
                    <div class="text-center">
                        <h5 class="sms-modal-header">The header</h5>
                        <p class="mb-1">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p>quas sit repellat voluptates animi</p>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="nameBasic" class="form-label">Name</label>
                                <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" />
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-0">
                                <label for="emailBasic" class="form-label">Email</label>
                                <input type="text" id="emailBasic" class="form-control" placeholder="xxxx@xxx.xx" />
                            </div>
                            <div class="col mb-0">
                                <label for="dobBasic" class="form-label">DOB</label>
                                <input type="text" id="dobBasic" class="form-control" placeholder="DD / MM / YY" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary flex-grow-1 flex-shrink-1 sms-flex-basis-0">Save
                            changes</button>
                        <button type="button"
                            class="btn btn-secondary flex-grow-1 flex-shrink-1 sms-flex-basis-0"data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
