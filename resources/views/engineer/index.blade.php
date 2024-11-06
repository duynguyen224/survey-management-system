@extends('layouts.main-layout')

@section('title', 'Engineers')

@section('content')
    <x-pages.page-header>
        <x-pages.page-title title="Engineers" />
        <x-button-modal id="btnAdd" label="Add new" icon='<i class="fa-solid fa-plus me-1"></i>'
            modalId="modalUpSertEngineer" />
    </x-pages.page-header>

    <x-pages.page-body>

        <div class="sms-page-filter">
            <p class="my-4">Filter</p>
            <div class="d-flex gap-3 mb-4">
                <div class="me-4">
                    <span class="fw-bold">Some text: </span>
                    <x-pill-filter href="#" isActive="{{ true }}" label="Abc" />
                    <x-pill-filter href="#" isActive="{{ false }}" label="Def" />
                    <x-pill-filter href="#" isActive="{{ false }}" label="Xyz" />
                </div>
                <div class="me-4">
                    <span class="fw-bold">Some text: </span>
                    <x-pill-filter href="#" isActive="{{ true }}" label="Abc" />
                    <x-pill-filter href="#" isActive="{{ false }}" label="Def" />
                    <x-pill-filter href="#" isActive="{{ false }}" label="Xyz" />
                </div>
            </div>
        </div>

        <div class="text-end">
            <x-button-modal id="btnSurveySelection" label="Survey Selection" icon='<i class="fa-regular fa-newspaper"></i>'
                modalId="" bsToggle="{{ false }}" />
        </div>

        <x-tables.table>
            <x-slot:tableHead>
                <th width="1%">
                    <x-form-controls.checkbox id="checkAll" />
                </th>
                <th width="10%">Type</th>
                <th width="15%">Name</th>
                <th width="15%">Email</th>
                <th>Registration date</th>
                <th>First company</th>
                <th width="3%" class="text-center">
                    <x-trash-icon />
                </th>
            </x-slot:tableHead>

            <x-slot:tableBody>
                @foreach ($engineers as $item)
                    <tr data-record-id="{{ $item->id }}" data-name="{{ $item->name }}"
                        data-email="{{ $item->email }}">
                        <td>
                            <x-form-controls.checkbox id="{{ $item->id }}" extraClass="rowCheckbox" />
                        </td>
                        <td>???</td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            <x-email-icon-text text="{{ $item->email }}" />
                        </td>
                        <td>
                            <x-calendar-icon-text text="{{ $item->created_at }}" />
                        </td>
                        <td>???</td>
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
        {{ $engineers->withQueryString()->links() }}
    </x-pages.page-footer>

    <!-- Modal create or update engineer -->
    <x-modals.modal-create-or-update modalId="modalUpSertEngineer" formId="formUpSertEngineer" labelSubmit="Register">
        <x-slot:modalHeader>
            <span class="headerCreateUser">Create engineer</span>
            <span class="headerUpdateUser">Update engineer</span>
        </x-slot:modalHeader>

        <x-slot:modalSubHeader>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia, provident?</p>
        </x-slot:modalSubHeader>

        <x-slot:formBody>
            <input type="hidden" name="engineerId" id="engineerId" value="">
            <div class="row">
                <div class="col mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" />
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
    <x-modals.modal-confirm-delete>
        <p>Are you sure want to delete engineer(s)?</p>
    </x-modals.modal-confirm-delete>

    {{-- Modal survey selection --}}
    @include('engineer.modal-survey-selection', ['surveys' => $surveys])

    {{-- Modal validation error --}}
    <x-modals.modal-error-message>
        <p>There is insufficient registration information.</p>
        <p>Please enter all the information.</p>
    </x-modals.modal-error-message>

    {{-- Modal no engineer selected --}}
    <x-modals.modal-error-message id="modalNoEngineerSelected">
        <p>At least one engineer has not been selected</p>
    </x-modals.modal-error-message>
@endsection

@section('scripts')
    <script src="{{ asset('sms/js/engineer/form-upsert-delete.js') }}"></script>
    <script src="{{ asset('sms/js/engineer/form-survey-selection.js') }}"></script>
    <script src="{{ asset('sms/js/engineer/index.js') }}"></script>
@endsection
