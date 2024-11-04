<x-survey.question-card extraClass="{{ 'sms-question-card-free-description ' . $extraClass }}" id="{{ $id }}"
    questionId="{{ $questionId }}" questionNumber="{{ $questionNumber }}">
    <div class="mb-4 row">
        <label for="name" class="col-2 col-form-label">QS title</label>
        <div class="col-10">
            <input class="form-control questionTitle" type="text" value="{{ $questionTitle }}"
                placeholder="Enter question title">
        </div>
    </div>

    <div class="mb-4 row">
        <label for="name" class="col-2 col-form-label">QS description</label>
        <div class="col-10">
            <input class="form-control questionDescription" type="text" value="{{ $questionDescription }}"
                placeholder="Enter question description">
        </div>
    </div>

    <div class="mb-4 row">
        <label for="name" class="col-2 col-form-label">QS type</label>
        <div class="col-3">
            <select class="form-select questionType" id="exampleFormControlSelect1">
                <option value="0">Single answer</option>
                <option value="1">Multiple answer</option>
                <option value="2" selected>Free text</option>
            </select>
        </div>
    </div>
</x-survey.question-card>
