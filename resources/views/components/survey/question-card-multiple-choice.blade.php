<x-survey.question-card extraClass="{{ 'sms-question-card-multiple-choice ' . $extraClass }}" id="{{ $id }}"
    questionId="{{ $questionId }}" questionType="{{ $questionType }}" questionNumber="{{ $questionNumber }}">
    <div class="mb-4 row">
        <label for="name" class="col-2 col-form-label">QS title</label>
        <div class="col-10">
            <input class="form-control" type="text" id="title" name="title" value=""
                placeholder="Enter question title">
        </div>
    </div>

    <div class="mb-4 row">
        <label for="name" class="col-2 col-form-label">QS description</label>
        <div class="col-10">
            <input class="form-control" type="text" id="title" name="title" value=""
                placeholder="Enter question description">
        </div>
    </div>

    <div class="mb-4 row">
        <label for="name" class="col-2 col-form-label">QS type</label>
        <div class="col-3">
            <select class="form-select" id="exampleFormControlSelect1">
                <option value="1">Single answer</option>
                <option value="2" selected>Multiple answer</option>
                <option value="3">Free text</option>
            </select>
        </div>

        <div class="col-3">
            <div class="d-flex gap-2">
                <label for="name" class="col-form-label">Number</label>
                <select class="form-select" id="exampleFormControlSelect1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
        </div>
    </div>

    <div class="mb-4 row">
        <label for="name" class="col-2 col-form-label">Choices</label>
        <div class="col-10">
            <div class="sms-answer-container">
                @for ($i = 1; $i <= 5; $i++)
                    <div class="col-3 sms-answer">
                        <div class="input-group">
                            <span class="input-group-text">{{ $i }}</span>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="mb-4 row">
        <label for="name" class="col-2 col-form-label">Branch</label>
        <div class="col-10 d-flex align-items-center gap-2">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" checked>
                <label class="form-check-label">
                    Yes
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="">
                <label class="form-check-label">
                    No
                </label>
            </div>
        </div>
    </div>

    <div class="mb-4 row">
        <label for="name" class="col-2 col-form-label">Condition</label>
        <div class="col-2">
            <div class="form-check mt-1">
                <input class="form-check-input" type="checkbox" value="" checked>
                <label class="form-check-label">
                    Hidden
                </label>
            </div>
        </div>

        <div class="col-3">
            <div class="d-flex gap-2">
                <label for="name" class="col-form-label">Question</label>
                <select class="form-select" id="exampleFormControlSelect1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
        </div>

        <div class="col-3">
            <div class="d-flex gap-2">
                <label for="name" class="col-form-label">Answer</label>
                <select class="form-select" id="exampleFormControlSelect1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
        </div>

        <div class="col-2 ps-0">
            <div class="d-flex">
                <label for="name" class="col-form-label"></label>
                <select class="form-select" id="exampleFormControlSelect1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
        </div>
    </div>

    <div class="mb-4 row">
        <label for="name" class="col-2 col-form-label">Display type</label>
        <div class="col-2">
            <div class="form-check mt-1">
                <input class="form-check-input" type="checkbox" value="">
                <label class="form-check-label">Free desc</label>
            </div>
        </div>

        <div class="col-3">
            <div class="d-flex gap-2">
                <label for="name" class="col-form-label">Question</label>
                <select class="form-select" id="exampleFormControlSelect1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
        </div>

        <div class="col-3">
            <div class="d-flex gap-2">
                <label for="name" class="col-form-label">Answer</label>
                <select class="form-select" id="exampleFormControlSelect1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
        </div>
    </div>
</x-survey.question-card>
