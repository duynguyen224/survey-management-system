@extends('layouts.main-layout')

@section('title', 'Companies')

@section('content')
    <x-pages.page-header>
        <x-pages.page-title title="Companies" />
        <div class="d-flex gap-1">
            <x-input-search id="iptSearch" name="input-search" placeholder="Search ..." />
            <x-button-link href="{{ route('companies.create') }}" label="Add new"
                icon='<i class="fa-solid fa-plus me-1"></i>' />
        </div>
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
            </div>
        </div>

        <x-tables.table>
            <x-slot:tableHead>
                <th width="1%">
                    <x-form-controls.checkbox id="checkAll" />
                </th>
                <th width="15%">Copmany name</th>
                <th width="15%">Manager</th>
                <th>Email</th>
                <th>Registration date</th>
                <th>Commission status</th>
                <th>Result</th>
                <th width="3%" class="text-center">
                    <x-trash-icon />
                </th>
            </x-slot:tableHead>

            <x-slot:tableBody>
                @foreach ($companies as $item)
                    <tr data-record-id="{{ $item->id }}">
                        <td>
                            <x-form-controls.checkbox id="{{ $item->id }}" extraClass="rowCheckbox" />
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->person_in_charge_name }}
                        </td>
                        <td>
                            <x-email-icon-text text="{{ $item->person_in_charge_email }}" />
                        </td>
                        <td>
                            <x-calendar-icon-text text="{{ $item->created_at }}" />
                        </td>
                        <td>
                            ???
                        </td>
                        <td>
                            ???
                        </td>
                        <td>
                            <x-dropdown-menu>
                                <x-dropdown-item id="" href="{{ route('companies.edit', ['company' => $item]) }}"
                                    class="btnEdit" icon='<i class="bx bx-edit-alt me-1"></i>' label="Edit" />
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
        {{ $companies->withQueryString()->links() }}
    </x-pages.page-footer>

    {{-- Modal confirm delete --}}
    <x-modals.modal-confirm-delete>
        <p>Are you sure want to delete company(s)?</p>
    </x-modals.modal-confirm-delete>

    {{-- Modal validation error --}}
    <x-modals.modal-error-message>
        <p>There is insufficient registration information.</p>
        <p>Please enter all the information.</p>
    </x-modals.modal-error-message>
@endsection

@section('scripts')
    <script src="{{ asset('sms/js/company/form-delete.js') }}"></script>
@endsection
