{{-- Modal confirm delete --}}
<div class="modal fade" id="modalSurveySelection" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <i class="fa-solid fa-x icon-button" data-bs-dismiss="modal"></i>
            </div>
            <div class="text-center">
                <h5 class="sms-modal-header">Send survey in bulk</h5>
                <p class="mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia, recusandae.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <form id="formSurveySelection">
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Select survey</label>
                            <select class="form-select required select2" id="surveyId" name="surveyId">
                                <option value="">Select survey</option>
                                @foreach ($surveys as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Survey response deadline</label>
                            <x-date-range-picker.single-date-picker id="iptSurveyResponseDeadline"
                                name="surveyResponseDeadline" value="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Number of people selected</label>
                            <input type="text" name="numberOfPeople" id="iptNumberOfPeople" class="form-control"
                                readonly />
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
