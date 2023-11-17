<!--   Core JS Files   -->
<script src="<?= _WEB_ROOT ?>/public/assets/admin/js/functions.js"></script>
<script src="<?= _WEB_ROOT ?>/public/assets/admin/js/core/popper.min.js"></script>
<script src="<?= _WEB_ROOT ?>/public/assets/admin/js/core/bootstrap.min.js"></script>
<script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/smooth-scrollbar.min.js"></script>
<script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/quill.min.js"></script>
<script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/dropzone.min.js"></script>
<script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/choices.min.js"></script>
<script src="<?= _WEB_ROOT ?>/public/assets/admin/js/Validation.js"></script>
<script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/dataTables.js"></script>
<script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/photoswipe.min.js"></script>
<script src="<?= _WEB_ROOT ?>/public/assets/admin/js/plugins/photoswipe-ui-default.min.js"></script>

<!-- <script>
    var alert = new bootstrap.Alert(document.getElementById('alert'));

    setTimeout(() => {
        alert.close;
    }, 5000);
</script> -->

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