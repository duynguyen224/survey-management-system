jQuery(function ($) {
    const $btnSubmitSurvey = $('#btnSubmitSurvey');
    const $formCreateOrUpdateSurvey = $('#formCreateOrUpdateSurvey');
    const $btnAddMoreQuestion = $('#btnAddMoreQuestion');

    const $questionContainer = $('.sms-question-container');
    const $questionCard = $('.sms-question-card');
    const $iconTrash = $('.iconTrash');
    const $iconMoveUp = $('.iconMoveUp');
    const $iconMoveDown = $('.iconMoveDown');

    let movePositionTimeout;

    reOrderingQuestionNumber();

    $btnAddMoreQuestion.click(function () {
        const html = $questionCard[0].outerHTML;
        $questionContainer.append(html);

        reOrderingQuestionNumber();
        scrollYAxis();
    });

    $(document).on('click', '.iconTrash', function () {
        const questionCard = $(this).closest('.sms-question-card').remove();
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

            // Re-assign href attribute
            $(this)
                .find('.iconMoveUp')
                .parent()
                .attr('href', `#question-card-${questionNumber - 1}`);
            $(this)
                .find('.iconMoveDown')
                .parent()
                .attr('href', `#question-card-${questionNumber + 1}`);
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

    function scrollYAxis(height) {
        if (!height) {
            height = $('.sms-page-body').height();
        }

        scrollToPosition(height);
    }

    function handleMoveUp(element) {
        // Clear any existing timeout to avoid multiple queued timeouts
        if (movePositionTimeout) {
            clearTimeout(movePositionTimeout);
        }

        // Set a new timeout and store its ID
        movePositionTimeout = setTimeout(() => {
            const $questionCard = element.closest('.sms-question-card');

            // Move up the UI
            if ($questionCard.prev().length) {
                $questionCard.insertBefore($questionCard.prev());
            }

            reOrderingQuestionNumber();

            // Clear the timeout once the function executes
            movePositionTimeout = null;
        }, 100);
    }

    function handleMoveDown(element) {
        // Clear any existing timeout to avoid multiple queued timeouts
        if (movePositionTimeout) {
            clearTimeout(movePositionTimeout);
        }

        // Set a new timeout and store its ID
        movePositionTimeout = setTimeout(() => {
            const $questionCard = element.closest('.sms-question-card');

            // Move down the UI
            if ($questionCard.next().length) {
                $questionCard.insertAfter($questionCard.next());
            }

            reOrderingQuestionNumber();

            // Clear the timeout once the function executes
            movePositionTimeout = null;
        }, 100);
    }
});
