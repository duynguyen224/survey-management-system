@extends('layouts.main-layout')

@section('title', 'Users')

@section('content')
    <x-page-header>
        <x-page-title title="Users" />
        <x-button-modal id="btnAdd" label="Add new" icon='<i class="fa-solid fa-plus me-1"></i>' modalId="modalUpSertUser" />
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
                            <input class="form-check-input" type="checkbox" id="checkAll">
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
                        <tr data-user-id="{{ $item->id }}" data-name="{{ $item->name }}"
                            data-email="{{ $item->email }}">
                            <td>
                                <input class="form-check-input rowCheckbox" type="checkbox">
                            </td>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                <x-email-icon-text text="{{ $item->email }}" />

                            </td>
                            <td>
                                <x-calendar-icon-text text="{{ $item->created_at }}" />
                            </td>
                            <td>
                                <x-dropdown-menu>
                                    <x-dropdown-item id="" class="btnEdit"
                                        icon='<i class="bx bx-edit-alt me-1"></i>' label="Edit" />
                                    <x-dropdown-item id="" class="btnDelete"
                                        icon='<i class="bx bx-trash me-1"></i>' label="Delete" />
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

    <!-- Modal create or update user -->
    <div class="modal fade" id="modalUpSertUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <i class="fa-solid fa-x icon-button" data-bs-dismiss="modal"></i>
                </div>
                <div class="text-center">
                    <h5 class="sms-modal-header headerCreateUser">管理ユーザー情報新規登録</h5>
                    <h5 class="sms-modal-header headerUpdateUser">管理ユーザー情報変更</h5>
                    <p>新規登録に必要な情報を入力の上、登録ボタンをクリックしてください。</p>
                </div>
                <form id="formUpSertUser">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="userId" id="userId" value="">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter name" required />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="Enter email" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary col-6">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal confirm delete --}}
    <div class="modal fade" id="modalConfirmDeleteUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <i class="fa-solid fa-x icon-button" data-bs-dismiss="modal"></i>
                </div>
                <div class="text-center">
                    <h5 class="sms-modal-header">Delete selected users?</h5>
                    <p>新規登録に必要な情報を入力の上、登録ボタンをクリックしてください。</p>
                </div>
                <form id="formConfirmDeleteUser">
                    <div class="modal-body">
                        <input type="hidden" name="userIds" id="userIds" value="">
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-danger col-6">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('sms/js/user/form-upsert-delete.js') }}"></script>
    <script src="{{ asset('sms/js/user/index.js') }}"></script>
@endsection
