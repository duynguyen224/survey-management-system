jQuery(function ($) {
    const $btnSubmitSurvey = $('#btnSubmitSurvey');
    const $formCreateOrUpdateSurvey = $('#formCreateOrUpdateSurvey');
    const $btnAddMoreQuestion = $('#btnAddMoreQuestion');

    const $questionContainer = $('.sms-question-container');
    const $questionCard = $('.sms-question-card');
    const $iconTrash = $('.iconTrash');
    const $iconMoveUp = $('.iconMoveUp');
    const $iconMoveDown = $('.iconMoveDown');

    const $modalConfirmDeleteQuestion = $('#modalConfirmDeleteQuestion');
    const $btnConfirmDeleteQuestion = $('#btnConfirmDeleteQuestion');

    reOrderingQuestionNumber();

    $btnAddMoreQuestion.click(function () {
        const html = $questionCard[0].outerHTML;
        $questionContainer.append(html);

        reOrderingQuestionNumber();
        scrollToPosition();
    });

    $(document).on('click', '.iconTrash', function () {
        $modalConfirmDeleteQuestion.modal('show');

        const questionCard = $(this).closest('.sms-question-card');
        const questionNumber = questionCard.attr('data-question-number');
        const formDataArray = [{ name: 'questionNumber', value: questionNumber }];

        autoFillForm('#formConfirmDeleteQuestion', formDataArray);
    });

    $btnConfirmDeleteQuestion.click(function () {
        const formDataArray = $('#formConfirmDeleteQuestion').serializeArray()
        let questionNumber = formDataArray.find((item) => item.name === 'questionNumber').value;

        const questionCardToDelete = $(`.sms-question-card[data-question-number="${questionNumber}"]`);
        questionCardToDelete.remove();

        $modalConfirmDeleteQuestion.modal('hide');
        
        reOrderingQuestionNumber();
    });

    $(document).on('click', '.iconMoveUp', function () {
        handleMoveUp($(this));
    });

    $(document).on('click', '.iconMoveDown', function () {
        handleMoveDown($(this));
    });

    $btnSubmitSurvey.click(function () {
        $formCreateOrUpdateSurvey.submit();
    });

    function reOrderingQuestionNumber() {
        // Re-ordering question number
        const $questionCard = $('.sms-question-card');

        $questionCard.each(function (index) {
            const questionNumber = index + 1;
            $(this).find('.sms-question-number').html(questionNumber);
            $(this).attr('data-question-number', questionNumber);
            $(this).attr('id', `question-card-${questionNumber}`);

            // Show all icon move up and down
            $(this).find('.iconMoveUp').show();
            $(this).find('.iconMoveDown').show();
        });

        // Hide icon move up of the first card
        const $firstQuestionCard = $questionCard.first();
        const $iconMoveUp = $firstQuestionCard.find('.iconMoveUp');
        $iconMoveUp.hide();

        // Hide icon move down of the last card
        const $lastQuestionCard = $questionCard.last();
        const $iconMoveDown = $lastQuestionCard.find('.iconMoveDown');
        $iconMoveDown.hide();
    }

    function handleMoveUp(element) {
        const $questionCard = element.closest('.sms-question-card');

        // Move up the UI
        if ($questionCard.prev().length) {
            $questionCard.insertBefore($questionCard.prev());
        }

        // Scroll to question above
        const questionNumber = parseInt($questionCard.attr('data-question-number'));
        const aboveQuestionNumber = questionNumber - 1;
        scrollToQuestionNumber(aboveQuestionNumber);

        reOrderingQuestionNumber();
    }

    function handleMoveDown(element) {
        const $questionCard = element.closest('.sms-question-card');

        // Move down the UI
        if ($questionCard.next().length) {
            $questionCard.insertAfter($questionCard.next());
        }

        // Scroll to question below
        const questionNumber = parseInt($questionCard.attr('data-question-number'));
        const belowQuestionNumber = questionNumber + 1;
        scrollToQuestionNumber(belowQuestionNumber);

        reOrderingQuestionNumber();
    }

    function scrollToQuestionNumber(questionNumber) {
        const headerHeight = 160;
        let totalQuestionCardHeight = 0;

        const $questionCard = $('.sms-question-card');
        $questionCard.each(function (index) {
            const questionIndex = index + 1;

            if (questionIndex < questionNumber) {
                totalQuestionCardHeight += $(this).outerHeight(true);
            }
        });

        const height = totalQuestionCardHeight + headerHeight;
        scrollToPosition(height);
    }
});
