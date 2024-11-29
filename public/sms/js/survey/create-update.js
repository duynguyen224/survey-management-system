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

    initUI();
    reOrderingQuestionNumber();

    // Initialize validation plugin
    const $form = $('#formCreateOrUpdateSurvey');
    $form.validate();

    $btnAddMoreQuestion.click(function () {
        // Copy and create new question card from hidden question card
        const $defaultQuestionCard = $questionCard[0]; // Native DOM element
        let $clonedQuestionCard = $($defaultQuestionCard).clone(); // Convert to jQuery object
        $clonedQuestionCard = $clonedQuestionCard.removeClass('d-none'); // Remove class d-none to make it visible

        // Get question card outer html
        const html = $clonedQuestionCard[0].outerHTML;
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
        const formDataArray = $('#formConfirmDeleteQuestion').serializeArray();
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

    $(document).on('change', '.questionType', function () {
        const questionType = $(this).val();

        // common.js
        // const SMS_QUESTION_TYPE_SINGLE_CHOICE = 0;
        // const SMS_QUESTION_TYPE_MULTIPLE_CHOICE = 1;
        // const SMS_QUESTION_TYPE_FREE_TEXT = 2;

        const $smsQuestionCard = $(this).closest('.sms-question-card');

        if (questionType == SMS_QUESTION_TYPE_SINGLE_CHOICE || questionType == SMS_QUESTION_TYPE_MULTIPLE_CHOICE) {
            // Show below elements
            $smsQuestionCard.find('.choiceNumberContainer').removeClass('d-none');
            $smsQuestionCard.find('.choiceContainer').removeClass('d-none');
            $smsQuestionCard.find('.branchContainer').removeClass('d-none');
        } else if (questionType == SMS_QUESTION_TYPE_FREE_TEXT) {
            // Hide below elements
            $smsQuestionCard.find('.choiceNumberContainer').addClass('d-none');
            $smsQuestionCard.find('.choiceContainer').addClass('d-none');
            $smsQuestionCard.find('.branchContainer').addClass('d-none');
        } else {
            alert('Some error occurred while changing question type');
        }
    });

    $(document).on('change', '.selectNumberOfChoice', function () {
        const numberOfChoices = $(this).val();

        const $cardContainer = $(this).closest('.sms-question-card');
        const $answerContainer = $cardContainer.find('.sms-answer-container');

        renderChoices($answerContainer, numberOfChoices);
    });

    $btnSubmitSurvey.click(function () {
        reOrderingQuestionNumber();

        $('#title').rules('add', {
            required: true,
            messages: {
                required: 'Survey title is required',
            },
        });

        $('.questionTitle').each(function () {
            const $container = $(this).closest('.sms-question-card');
            if (!$container.hasClass('d-none')) {
                $(this).rules('add', {
                    required: true,
                    messages: {
                        required: 'Question title is required',
                    },
                });
            }
        });

        $('.questionDescription').each(function () {
            const $container = $(this).closest('.sms-question-card');
            if (!$container.hasClass('d-none')) {
                $(this).rules('add', {
                    required: true,
                    messages: {
                        required: 'Question description is required',
                    },
                });
            }
        });

        $('.iptChoice').each(function () {
            const $container = $(this).closest('.sms-question-card');
            if (!$container.hasClass('d-none')) {
                $(this).rules('add', {
                    required: true,
                    messages: {
                        required: 'Answer is required',
                    },
                });
            }
        });

        handleSubmitForm($form);
    });

    function initUI() {
        $('.sms-question-card').each(function () {
            // Hide un-needed element
            const questionType = $(this).find('.questionType').val();
            if (questionType == 2) {
                // 2 ~ free description

                $(this).find('.choiceNumberContainer').addClass('d-none');
                $(this).find('.choiceContainer').addClass('d-none');
            }

            // Display the answer
            const $hiddenAnswer = $(this).find('.hidden-answer');

            if ($hiddenAnswer.length && $hiddenAnswer.val().length > 0) {
                let decodedString = $hiddenAnswer.val().replace(/&quot;/g, '"');
                let arrChoices = JSON.parse(decodedString);

                const $iptChoice = $(this).find('.iptChoice');
                $iptChoice.each(function (index) {
                    $(this).val(arrChoices[index]);
                });
            }
        });
    }

    function reOrderingQuestionNumber() {
        // Re-ordering question number
        const $questionCard = $('.sms-question-card');

        let index = 1;
        $questionCard.each(function () {
            if ($(this).hasClass('d-none')) {
                return; // skip here, start with next element // same as 'continue' in loop
            }

            const questionNumber = index;
            $(this).find('.sms-question-number').html(questionNumber);
            $(this).attr('data-question-number', questionNumber);
            $(this).attr('id', `question-card-${questionNumber}`);

            // Show all icon move up and down
            $(this).find('.iconMoveUp').show();
            $(this).find('.iconMoveDown').show();

            // Re-append the name attribute for validation rules
            $inputTitle = $(this).find('.questionTitle');
            $inputDescription = $(this).find('.questionDescription');
            $selectType = $(this).find('.questionType');
            $inputAnswer = $(this).find('.iptChoice');

            $inputTitle.attr('name', `questions[${index}][title]`);
            $inputDescription.attr('name', `questions[${index}][description]`);
            $selectType.attr('name', `questions[${index}][type]`);

            $inputAnswer.each(function (i) {
                $(this).attr('name', `questions[${index}|${i}][choice]`);
            });

            index++;
        });

        // Hide icon move up of the first card
        const $firstQuestionCard = $questionCard.eq(1);
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

    function handleSubmitForm(formElement) {
        if (formElement.valid()) {
            // Collect form data
            const formDataArray = $(formElement).serializeArray();
            let surveyTitle = formDataArray.find((item) => item.name === 'title').value;

            const url = formElement.attr('action');

            let listQuestion = [];
            $('.sms-question-card').each(function (index) {
                const $container = $(this).closest('.sms-question-card');

                if (!$container.hasClass('d-none')) {
                    const questionTitle = $(this).find('.questionTitle').val();
                    const questionDescription = $(this).find('.questionDescription').val();
                    const questionType = $(this).find('.questionType').val();
                    const choices = $(this).find('.iptChoice');

                    let listChoices = [];
                    choices.each(function () {
                        const choiceValue = $(this).val();
                        listChoices.push(choiceValue);
                    });

                    const question = {
                        title: questionTitle,
                        description: questionDescription,
                        type: questionType,
                        number: index,
                        choices: listChoices,
                    };

                    listQuestion.push(question);
                }
            });

            // Prepare survey data
            let surveyData = {
                title: surveyTitle,
                questions: listQuestion,
            };

            console.log(surveyData);
            // return;

            $.ajax({
                url: url,
                method: HTTP_VERB.POST,
                data: surveyData,
                success: function (res) {
                    if (res.isSuccess) {
                        redirectToUrl(SMS_SURVEY_LIST_API);
                    } else {
                        showModalErrorMessage();
                        showServerValidationMessages(res);
                    }
                },
                error: function (xhr) {
                    handleAjaxError();
                },
            });
        } else {
            showModalErrorMessage();
        }
    }

    function renderChoices(answerContainer, numberOfChoices) {
        let html = '';

        for (let i = 1; i <= numberOfChoices; i++) {
            html += `<div class="col-3 sms-answer">
                        <div class="input-group">
                            <span class="input-group-text">${i}</span>
                            <input type="text" class="form-control iptChoice" placeholder="Enter choice">
                        </div>
                    </div>`;
        }

        answerContainer.html(html);
    }
});
