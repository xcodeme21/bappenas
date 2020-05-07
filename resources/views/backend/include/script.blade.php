
    <script src="{{ asset('public/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('public/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ asset('public/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/app.init.js') }}"></script>
    <script src="{{ asset('public/dist/js/app-style-switcher.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('public/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('public/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('public/dist/js/custom.min.js') }}"></script>
    <!-- This Page JS -->
    <script src="{{ asset('public/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('public/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('public/assets/extra-libs/jvector/jquery-jvectormap-in-mill.js') }}"></script>
    <script src="{{ asset('public/assets/extra-libs/jvector/jquery-jvectormap-us-aea-en.js') }}"></script>
    <script src="{{ asset('public/assets/extra-libs/jvector/jquery-jvectormap-uk-mill-en.js') }}"></script>
    <script src="{{ asset('public/assets/extra-libs/jvector/jquery-jvectormap-au-mill.js') }}"></script>
    <script src="{{ asset('public/assets/libs/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/pages/chartist/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('public/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
    <script>
      $(function() {
        $('#usa').vectorMap({
          map : 'us_aea_en',
          backgroundColor : 'transparent',
          zoomOnScroll: false,
          regionStyle : {
              initial : {
                  fill : '#2cabe3'
              }
          }
        });
      });
    </script>

    <script src="{{ asset('public/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
    // Date Picker
    jQuery('.mydatepicker, #datepicker, .input-group.date').datepicker();
    jQuery('.tanggal').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'yyyy-mm-dd'
    });
    jQuery('.tahun').datepicker({
        format: "yyyy",
        autoclose: true,
        weekStart: 1,
        orientation: "bottom",
        keyboardNavigation: false,
        viewMode: "years",
        minViewMode: "years"
    });

    $('.datatable').DataTable();

    </script>

    

	
	<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>