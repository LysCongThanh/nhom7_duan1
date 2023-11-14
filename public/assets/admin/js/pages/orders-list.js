if (document.getElementById('orders-list')) {
    const dataTableSearch = new simpleDatatables.DataTable("#orders-list", {
        searchable: true,
        fixedHeight: false,
        perPage: 7
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
}