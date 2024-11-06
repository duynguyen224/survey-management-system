{{-- Modal validation error --}}
<div class="modal fade" id="modalNoEngineerSelected" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title"></h5>
              {{-- <i class="fa-solid fa-x icon-button" data-bs-dismiss="modal"></i> --}}
          </div>
          <div class="text-center">
              <h5 class="sms-modal-header"></h5>
              <i class="fa-regular fa-circle-xmark fa-2xl text-danger"></i>
          </div>
          <form id="formValidatonError">
              <div class="modal-body">
                  <div class="text-center">
                      <p>At least one engineer has not been selected</p>
                  </div>
                  <input type="hidden" name="recordIds" id="recordIds" value="">
              </div>
              <div class="modal-footer d-flex justify-content-center">
                  <button type="button" class="btn btn-primary col-6" data-bs-dismiss="modal">OK</button>
              </div>
          </form>
      </div>
  </div>
</div>