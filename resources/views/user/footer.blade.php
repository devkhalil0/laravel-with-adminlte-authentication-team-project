  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#">Footer</a>.</strong>
        All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="{{ asset('backend/js/adminlte.js') }}"></script>
{{-- <script src="{{ asset('backend/js/adminltepackages.js') }}"></script> --}}
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Pages Based js -->
@yield('js')
</body>
</html>
