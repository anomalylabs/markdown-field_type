(function (window, document) {

    let fields = Array.from(
        document.querySelectorAll('textarea[data-provides="anomaly.field_type.markdown"]')
    );

    let tabs = Array.from(
        document.querySelectorAll('a[data-toggle="tab"]')
    );

    fields.forEach(function (field) {

        let markdown = new SimpleMDE({element: field});

        if (tabs.length) {
            tabs.forEach(function (tab) {
                tab.addEventListener('shown.bs.tab', function () {
                    alert();
                    setTimeout(function () {
                        markdown.codemirror.refresh();
                    }, 10);
                });
            })
        }
    });

})(window, document);
