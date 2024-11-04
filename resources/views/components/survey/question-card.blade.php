<div class="sms-question-card {{ $extraClass }} row" id='question-card-{{ $id }}'
    data-question-id='{{ $questionId }}' data-question-type='{{ $questionType }}'
    data-question-number='{{ $questionNumber }}'>
    <div class="col-1">
        <span class="sms-question-number">1</span>
    </div>

    <div class="sms-question-content col-10">
        {{ $slot }}
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
