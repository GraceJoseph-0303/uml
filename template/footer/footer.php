
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/popper.js/umd/popper.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
<!-- BEGIN PLUGINS JS -->
<script src="assets/vendor/pace-progress/pace.min.js"></script>
<script src="assets/vendor/stacked-menu/js/stacked-menu.min.js"></script>
<script src="assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script> <!-- END PLUGINS JS -->
<script src="assets/vendor/flatpickr/flatpickr.min.js"></script>


<!-- BEGIN THEME JS -->
<script src="assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script> <!-- END PLUGINS JS -->
<!-- BEGIN THEME JS -->
<script src="assets/javascript/theme.min.js"></script> <!-- END THEME JS -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="assets/javascript/pages/dataTables.bootstrap.js"></script>
<script src="assets/javascript/pages/datatables-responsive-demo.js"></script> <!-- END PAGE LEVEL JS -->

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('.select-role').select2();
    $('.select-gender').select2();
    $('.select-college').select2();
      $('.select-dep').select2();
});
</script>
<script type="text/javascript">
    $(document).ready(function () {
        var url = window.location;
        $('ul.menu a[href="'+ url +'"]').parent().addClass('has-active');
        $('ul.menu a').filter(function() {
             return this.href == url;
        }).parent().addClass('has-active');
    });
</script>
