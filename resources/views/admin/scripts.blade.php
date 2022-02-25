<!-- jQuery -->
<script src="../../../admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
{{-- <script src="../../../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<!-- DataTables  & Plugins -->
<script src="../../../admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../../admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../../admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../../admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../../admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../../admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../../admin/plugins/jszip/jszip.min.js"></script>
<script src="../../../admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../../admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../../admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../../admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../../admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

{{-- <script src="../../../admin/dist/js/demo.js"></script> --}}


<script src="../../dist/js/demo.js"></script>

<script src="../../../admin/dist/js/demo.js"></script>

<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>
