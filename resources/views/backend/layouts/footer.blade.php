  <!-- CORE PLUGINS-->
  <script src="{{asset('backend/assets/vendors/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/vendors/popper.js/dist/umd/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/vendors/metisMenu/dist/metisMenu.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS-->
    <script src="{{asset('backend/assets/vendors/chart.js/dist/Chart.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js')}}" type="text/javascript"></script>
    <!-- CORE SCRIPTS-->
    <script src="{{asset('backend/assets/js/app.min.js')}}" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <script src="{{asset('backend/assets/js/scripts/dashboard_1_demo.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/assets/vendors/DataTables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>
     <!-- PAGE LEVEL SCRIPTS-->
     <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });
        })
    </script>
    <!-- bs-custom-file-input -->
    <script src="{{asset('backend/assets/js/bs-custom-file-input.min.js')}}" type="text/javascript"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
        bsCustomFileInput.init();
        });
    </script>
    <!--summernote-->
    <script src="{{asset('backend/assets/summernote/summernote.js')}}" type="text/javascript"></script>

    @yield('scripts')

    <script>
        setTimeout(function(){
            $('alert').slideUp();
        },4000);
    </script>