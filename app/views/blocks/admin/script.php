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
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/chartjs.min.js"></script>
    <script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/swiper-bundle.min.js"></script>

    <!-- Webroot -->
    <script>
        function formattedCurrency(amount, currencyCode = 'VND') {
            // Sử dụng Intl.NumberFormat để định dạng số thành chuỗi tiền tệ
            const formatter = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: currencyCode,
                minimumFractionDigits: 0, // Đảm bảo không có phần thập phân
            });

            // Áp dụng định dạng và trả về chuỗi tiền tệ
            return formatter.format(amount);
        }
        const webRoot = window.location.origin
        const query = new URLSearchParams(window.location.search);
        setTimeout(() => {
            if (document.querySelector('button.btn-close[data-bs-dismiss="alert"][aria-label="Close"]')) {
                document.querySelector('button.btn-close[data-bs-dismiss="alert"][aria-label="Close"]').click();
            }
        }, 4000);
    </script>



    <script>
        if (document.getElementById('products-list')) {
            const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
                searchable: true,
                fixedHeight: false,
                perPage: 7
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