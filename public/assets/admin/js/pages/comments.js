if (document.getElementById('datatable-search')) {
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: false,
        perPage: 5
    });

    document.querySelectorAll(".export").forEach(function (el) {
        el.addEventListener("click", function (e) {
            var type = el.dataset.type;

            var data = {
                type: type,
                filename: "soft-ui-" + type,
            };

            if (type === "csv") {
                data.columnDelimiter = "|";
            }

            dataTableSearch.export(data);
        });
    });
};

Validator({
    form: '#reply_comment',
    formGroupSelector: '.form-group',
    errorSelector: '.form-message',

    rules: [
        Validator.isRequired('.form-group textarea[name="content"]', '* Không được bỏ trống !'),
    ],
});