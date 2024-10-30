jQuery(function ($) {
    const $btnSubmitSurvey = $('#btnSubmitSurvey');
    const $formCreateOrUpdateSurvey = $('#formCreateOrUpdateSurvey');

    $btnSubmitSurvey.click(function(){
        $formCreateOrUpdateSurvey.submit();
    });
});
