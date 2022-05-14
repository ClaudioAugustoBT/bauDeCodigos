<!-- Script
================================================== 
-->
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo base_url(); ?>public/js/dist/jquery.mask.js"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>public/js/dist/bootstrap.min.js"></script>

<!-- FontAwasome -->
<script src="<?php echo base_url(); ?>public/js/dist/all.js"></script>

<!-- SweetAlert -->
<script src="<?php echo base_url(); ?>public/js/dist/sweetalert2.all.min.js"></script>

<!-- Datatable -->
<script src="<?php echo base_url(); ?>public/js/dist/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/dist/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>public/js/dist/dataTables.bootstrap.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url(); ?>public/js/dist/select2.min.js"></script>

<!-- Helper / Utilidades -->
<script src="<?php echo base_url(); ?>public/js/helper.js"></script>

<!-- Scripts inseridos -->
<?php
if (isset($scripts)) {
	foreach ($scripts as $script_name) {
		$src = base_url() . "public/js/" . $script_name;
?>
		<script src="<?= $src ?>"></script>
<?php }
}
?>

</body>

</html>