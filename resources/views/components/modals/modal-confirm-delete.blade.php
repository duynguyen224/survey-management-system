{{-- Modal confirm delete --}}
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                {{-- <i class="fa-solid fa-x icon-button" data-bs-dismiss="modal"></i> --}}
            </div>
            <div class="text-center">
                <h5 class="sms-modal-header"></h5>
                {{ $slot }}
            </div>
            <form id="formConfirmDelete" method="POST">
                @csrf
                @method("DELETE")

                <div class="modal-body">
                    <input type="hidden" name="recordIds" id="recordIds" value="">
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary col-4">Delete</button>
                    <button type="button" class="btn btn-secondary col-4" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>