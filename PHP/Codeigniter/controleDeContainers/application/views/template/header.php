<!DOCTYPE html>

<head>
	<!-- CSS principal -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/main-style.css">

	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/dist/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/dist/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/dist/all.css">

	<!-- Datatables -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/dist/datatables.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/dist/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/dist/jquery.dataTables.css">

	<!-- Select2 -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/dist/select2.min.css">

	<!-- SweetAlert2 -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/css/dist/sweetalert2.min.css">

	<!-- REQUISIÇÃO DA FONTE --- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<!-- Insert de Styles -->


	<!-- REQUISIÇÃO INSERIDAS -->
	<?php
	if (isset($styles)) {
		foreach ($styles as $style_name) {
			$href = base_url() . "public/css/dist/" . $style_name; ?>
			<link href="<?= $href ?>" rel="stylesheet">
	<?php }
	}
	?>
</head>

<body>
	<nav class="navbar navbar-light navbar-expand-lg">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav_0" aria-controls="nav_0" aria-expanded="false">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="nav_0">
			<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<li class="nav-item">
					<button id="btn_nav_containers" class="btn btn-outline-light text-uppercase font-weight-bold m-1"><i class="fa-solid fa-boxes-stacked"></i>&nbsp; Containers</button>
				</li>
				<!-- <li class="nav-item">
					<butto id="btn_nav_movimentacao" n class="btn btn-outline-light text-uppercase font-weight-bold m-1"><i class="fa-solid fa-right-left"></i>&nbsp; Movimentação</button>
				</li>
				<li class="nav-item">
					<button id="btn_nav_relatorios" class="btn btn-outline-light text-uppercase font-weight-bold m-1"><i class="fa-solid fa-file-invoice"></i>&nbsp; Relatórios</button>
				</li> -->
			</ul>
		</div>
	</nav>