$(function () {

    // Initialize markdown inputs.
    $('[data-provides="anomaly.field_type.markdown"]').each(function () {
        $(this).markdown({
            height: $(this).data('height'),
            iconlibrary: 'fa'
        });
    });
});
