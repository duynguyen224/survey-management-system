<div class="sms-question-card {{ $extraClass }} row" id='question-card-{{ $id }}'
    data-question-id='{{ $questionId }}' data-question-number='{{ $questionNumber }}'>
    <div class="col-1">
        <span class="sms-question-number">1</span>
    </div>

    <div class="sms-question-content col-10">
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
                    <option value="1" selected>Multiple answer</option>
                    <option value="2">Free text</option>
                </select>
            </div>

            <div class="col-3 choiceNumberContainer">
                <div class="d-flex gap-2">
                    <label for="name" class="col-form-label">Number</label>
                    <select class="form-select selectNumberOfChoice">
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

        <div class="mb-4 row choiceContainer">
            <label for="name" class="col-2 col-form-label">Choices</label>
            <div class="col-10">
                <div class="sms-answer-container">
                    <div class="col-3 sms-answer">
                        <div class="input-group">
                            <span class="input-group-text">1</span>
                            <input type="text" class="form-control iptChoice">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4 row branchContainer">
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

        <div class="mb-4 row conditionContainer">
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

        <div class="mb-4 row displayTypeContainer">
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
    </div>

    <div class="sms-question-button col-1">
        <div class="sms-icon-trash">
            <i class="fa-solid fa-trash text-tertiary-gray icon-button iconTrash"></i>
        </div>
        <div class="sms-group-icon-move">
            <div>
                <i class="fa-regular fa-circle-up text-tertiary-gray icon-button iconMoveUp"></i>
            </div>
            <div>
                <i class="fa-regular fa-circle-down text-tertiary-gray icon-button iconMoveDown"></i>
            </div>
        </div>
        <div class="sms-empty-div"></div>
    </div>
</div>
