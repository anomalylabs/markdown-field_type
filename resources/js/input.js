(function (window, document) {

    let fields = Array.from(
        document.querySelectorAll('textarea[data-provides="anomaly.field_type.markdown"]')
    );

    fields.forEach(function (field) {
        new SimpleMDE({element: field});
    });
})(window, document);
