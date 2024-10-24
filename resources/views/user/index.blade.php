@extends('layouts.main-layout')

@section('title', 'Users')

@section('content')
    <x-page-header>
        <x-page-title title="Users" />
        <x-button-modal label="Add new" icon='<i class="fa-solid fa-plus me-1"></i>' modalId="modal-create-user" />
    </x-page-header>

    <x-page-body>

        <div class="sms-page-filter">
            <x-empty-space />
        </div>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover table-borderless">
                <thead>
                    <tr>
                        <th width="1%">
                            <input class="form-check-input" type="checkbox" checked="">
                        </th>
                        <th width="15%">Name</th>
                        <th width="15%">Email</th>
                        <th>Registration date</th>
                        <th width="3%" class="text-center">
                            <x-trash-icon />
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>
                                <input class="form-check-input" type="checkbox" checked="">
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                <x-email-icon-text text="{{ $item->email }}" />
                            </td>
                            <td>
                                <x-calendar-icon-text text="2024.10.18" />
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-page-body>

    <x-page-footer>
        {{ $users->withQueryString()->links() }}
    </x-page-footer>

    <!-- Modal create -->
    <div class="modal fade" id="modal-create-user" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <i class="fa-solid fa-x icon-button" data-bs-dismiss="modal"></i>
                </div>
                <div class="text-center">
                    <h5 class="sms-modal-header">Create new user</h5>
                    <p class="mb-1">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p>quas sit repellat voluptates animi</p>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" placeholder="Enter name" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" class="form-control" placeholder="Enter email" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-primary col-6">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
