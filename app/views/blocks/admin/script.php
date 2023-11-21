    <!--   Core JS Files   -->
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/functions.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/core/popper.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/core/bootstrap.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/quill.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/dropzone.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/Validation.js"></script>
    <script src="<?= _WEB_ROOT ?>public\assets\admin\js\plugins\dataTables.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/photoswipe.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/photoswipe-ui-default.min.js"></script>
    <script src="<?= _WEB_ROOT ?>public\assets\admin\js\pages\add-books.js"></script>



    <script>
        if (document.getElementById('products-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
                searchable: true,
                fixedHeight: false,
                perPage: 7,
                perPageSelect: [5, 10, 15, ["All", -1]],
                columns: [
                    {
                        select: 1,
                        searchItemSeparator: ";",
                        ignorePunctuation: false
                    },
                    {
                        select: 2,
                        sortSequence: ["desc", "asc"]
                    },
                    {
                        select: 3,
                        sortSequence: ["desc"]
                    },
                    {
                        select: 4,
                        cellClass: "green",
                        headerClass: "red"
                    }
                ],
                template: (options, dom) => `<div class='${options.classes.top}'>
                    <div class='${options.classes.dropdown}'>
                        <label>
                            <select class='${options.classes.selector}'></select> ${options.labels.perPage}
                        </label>
                    </div>
                    <div class='${options.classes.search}'>
                        <input class='${options.classes.input}' placeholder='OR search' type='search' title='${options.labels.searchTitle}'${dom.id ? ` aria-controls="${dom.id}"` : ""}>
                        <input class='${options.classes.input}' placeholder='AND search' type='search' data-and="true" title='${options.labels.searchTitle}'${dom.id ? ` aria-controls="${dom.id}"` : ""}>
                    </div>
                    </div>
                    <div class='${options.classes.container}'${options.scrollY.length ? ` style='height: ${options.scrollY}; overflow-Y: auto;'` : ""}></div>
                    <div class='${options.classes.bottom}'>
                    <div class='${options.classes.info}'></div>
                    <nav class='${options.classes.pagination}'></nav>
                </div>`
            });

            document.querySelectorAll(".export").forEach(function(el) {
                el.addEventListener("click", function(e) {
                    var type = el.dataset.type;

                    var data = {
                        type: type,
                        filename: "soft-ui-" + type,
                    };

                    if (type === "excel") {
                        data.columnDelimiter = "|";
                    }

                    dataTableSearch.export(data);
                });
            });
        };
    </script>



    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Corporate UI Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/corporate-ui-dashboard.min.js?v=1.0.0"></script>
    <!-- *****************************JS files required for the current page***************************** -->
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/pages/{{$script_src}}.js"></script>
    </body>

    </html>