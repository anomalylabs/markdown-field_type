$(function () {

    // Initialize markdown inputs.
    $('.markdown-field_type textarea').each(function () {

        $(this).markdown({
            height: $(this).data('height'),
            iconlibrary: 'fa'
        });
    });
});
