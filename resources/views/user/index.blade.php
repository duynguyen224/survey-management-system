@extends('layouts.main-layout')

@section('title', 'Users')

@section('content')
    <x-pages.page-header>
        <x-pages.page-title title="Users" />
        <x-button-modal id="btnAdd" label="Add new" icon='<i class="fa-solid fa-plus me-1"></i>' modalId="modalUpSertUser" />
    </x-pages.page-header>

    <x-pages.page-body>

        <div class="sms-page-filter">
            <x-empty-space />
        </div>

        <x-tables.table>
            <x-slot:tableHead>
                <th width="1%">
                    <x-form-controls.checkbox id="checkAll"/>
                </th>
                <th width="15%">Name</th>
                <th width="15%">Email</th>
                <th>Registration date</th>
                <th width="3%" class="text-center">
                    <x-trash-icon />
                </th>
            </x-slot:tableHead>

            <x-slot:tableBody>
                @foreach ($users as $item)
                    <tr data-record-id="{{ $item->id }}" data-name="{{ $item->name }}" data-email="{{ $item->email }}">
                        <td>
                            <x-form-controls.checkbox id="{{ $item->id }}" extraClass="rowCheckbox"/>
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
                                <x-dropdown-item id="" class="btnEdit" icon='<i class="bx bx-edit-alt me-1"></i>'
                                    label="Edit" />
                                <x-dropdown-item id="" class="btnDelete" icon='<i class="bx bx-trash me-1"></i>'
                                    label="Delete" />
                            </x-dropdown-menu>
                        </td>
                    </tr>
                @endforeach
            </x-slot:tableBody>
        </x-tables.table>
    </x-pages.page-body>

    <x-pages.page-footer>
        {{ $users->withQueryString()->links() }}
    </x-pages.page-footer>

    <!-- Modal create or update user -->
    <x-modals.modal-create-or-update modalId="modalUpSertUser" formId="formUpSertUser">
        <x-slot:modalHeader>
            <span class="headerCreateUser">Create user</span>
            <span class="headerUpdateUser">Update user</span>
        </x-slot:modalHeader>

        <x-slot:modalSubHeader>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia, provident?</p>
        </x-slot:modalSubHeader>

        <x-slot:formBody>
            <input type="hidden" name="userId" id="userId" value="">
            <div class="row">
                <div class="col mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter name"
                        required />
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter email" />
                </div>
            </div>
        </x-slot:formBody>
    </x-modals.modal-create-or-update>

    {{-- Modal confirm delete --}}
    <x-modals.modal-confirm-delete warningMessage="Are you sure want to delete user(s)?" />

@endsection

@section('scripts')
    <script src="{{ asset('sms/js/user/form-upsert-delete.js') }}"></script>
    <script src="{{ asset('sms/js/user/index.js') }}"></script>
@endsection
