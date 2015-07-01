$(function () {

    // Initialize markdown inputs.
    $('.markdown-field-type textarea').each(function () {

        $(this).markdown({
            height: $(this).data('height'),
            iconlibrary: 'fa'
        });
    });
});
