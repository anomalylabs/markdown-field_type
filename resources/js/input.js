$(document).on('ajaxComplete ready', function () {

    // Initialize markdown inputs.
    $('[data-provides="anomaly.field_type.markdown"]:not([data-initialized])').each(function () {

        $(this)
            .attr('data-initialized', '')
            .markdown({
                height: $(this).data('height'),
                iconlibrary: 'fa'
            });
    });
});
