    <!--   Core JS Files   -->
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/functions.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/core/popper.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/core/bootstrap.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/quill.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/dropzone.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/Validation.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/dataTables.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/photoswipe.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/photoswipe-ui-default.min.js"></script>
    <script src="<?= _WEB_ROOT ?>public\assets\admin\js\pages\add-books.js"></script>
   


    <script>
        if (document.getElementById('products-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
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
    <!-- Main js -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var myView = document.getElementById("form-view");
            if (myView) {
                var viewName = myView.getAttribute("data-view");
                handleView(viewName);
            }
        });
    </script>
</body>

</html>