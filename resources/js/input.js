(function (window, document) {

    let fields = Array.prototype.slice.call(
        document.querySelectorAll('textarea[data-provides="anomaly.field_type.markdown"]')
    );

    let tabs = Array.prototype.slice.call(
        document.querySelectorAll('a[data-toggle="tab"]')
    );

    fields.forEach(function (field) {

        let markdown = new SimpleMDE({element: field});

        if (tabs.length) {
            tabs.forEach(function (tab) {
                tab.addEventListener('click', function () {
                    setTimeout(function () {
                        markdown.codemirror.refresh();
                    }, 10);
                });
            })
        }
    });

})(window, document);
