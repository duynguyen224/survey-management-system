@extends('layouts.main-layout')

@section('title', 'Surveys')

@section('content')
    <x-pages.page-header>
        <x-pages.page-title title="Surveys" />
        <div class="d-flex gap-1">
            <x-input-search id="iptSearch" name="input-search" placeholder="Search ..." />
            <x-button-link href="{{ route('surveys.create') }}" label="Add new"
                icon='<i class="fa-solid fa-plus me-1"></i>' />
        </div>
    </x-pages.page-header>

    <x-pages.page-body>

        <div class="sms-page-filter">
            <x-empty-space />
        </div>

        <x-tables.table>
            <x-slot:tableHead>
                <th width="1%">
                    <x-form-controls.checkbox id="checkAll" />
                </th>
                <th width="15%">Title</th>
                <th width="15%">Creator</th>
                <th>Registration date</th>
                <th width="3%" class="text-center">
                    <x-trash-icon />
                </th>
            </x-slot:tableHead>

            <x-slot:tableBody>
                @foreach ($surveys as $item)
                    <tr data-record-id="{{ $item->id }}">
                        <td>
                            <x-form-controls.checkbox id="{{ $item->id }}" extraClass="rowCheckbox" />
                        </td>
                        <td>
                            {{ $item->title }}
                        </td>
                        <td>
                            {{ $item->created_by_name }}
                        </td>
                        <td>
                            <x-calendar-icon-text text="{{ $item->created_at }}" />
                        </td>
                        <td>
                            <x-dropdown-menu>
                                <x-dropdown-item id="" href="{{ route('surveys.edit', ['survey' => $item]) }}"
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
        {{ $surveys->withQueryString()->links() }}
    </x-pages.page-footer>

    {{-- Modal confirm delete --}}
    <x-modals.modal-confirm-delete>
        <p>Are you sure want to delete survey(s)?</p>
    </x-modals.modal-confirm-delete>

    {{-- Modal validation error --}}
    <x-modals.modal-error-message>
        <p>There is insufficient registration information.</p>
        <p>Please enter all the information.</p>
    </x-modals.modal-error-message>
@endsection

@section('scripts')
    <script src="{{ asset('sms/js/survey/form-delete.js') }}"></script>
@endsection
