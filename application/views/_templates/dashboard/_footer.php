</section>

</div>

<footer class="main-footer">
   <div class="pull-right hidden-xs">
      dikembangkan oleh <strong><a href="#">Creative Tator</a>.</strong>
   </div>
   <strong>&copy; 2022 GULAMANISTA</strong> - <strong><a href="https://diskominfo.baubaukota.go.id" target="_blank">Dinas Komunikasi dan Informatika Kota Baubau</a>.</strong>
</footer>

<div class="control-sidebar-bg"></div>
</div>

<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url(); ?>assets/themes/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url(); ?>assets/themes/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url(); ?>assets/themes/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/themes/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url(); ?>assets/themes/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url(); ?>assets/themes/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url(); ?>assets/themes/plugins/select2/dist/js/select2.full.min.js"></script>
<!-- Toast -->
<script src="<?= base_url(); ?>assets/themes/plugins/toast/jquery.toast.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url(); ?>assets/themes/plugins/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/themes/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/themes/js/demo.js"></script>
<!-- Pages -->
<script src="<?= base_url(); ?>assets/themes/js/pages/img.js"></script>

<script>
   $(document).ready(function() {
      <?= $this->session->flashdata("msg"); ?>
   });
</script>
</body>

</html>