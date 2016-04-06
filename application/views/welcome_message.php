<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Profil Desa Tanimulya</title>

		<link rel="icon" href="<?php echo base_url('assets/img/index.png') ?>">

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<script src="<?php echo base_url() ?>assets/js/jquery.2.1.1.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
		
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Profil Desa Tanimulya
						</small>
					</a>
				</div>

			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container" id="main-container">

			<div id="sidebar" class="sidebar responsive">

				<ul class="nav nav-list">
					<li class="">
						<a href="<?php echo site_url() ?>">
							<i class="menu-icon fa fa-home"></i>
							<span class="menu-text"> Beranda </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-bar-chart"></i>
							<span class="menu-text"> Grafik </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="<?php echo site_url('welcome/grafik_jumduk') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Jumlah Penduduk
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="<?php echo site_url('welcome/grafik_kk') ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									Kepeilikan KK
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class="">
						<a href="<?php echo site_url('login/index') ?>">
							<i class="menu-icon fa fa-sign-in"></i>
							<span class="menu-text"> Login </span>
						</a>

						<b class="arrow"></b>
					</li>

				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">

						<ul class="breadcrumb">
							<li class="active">
								<i class="ace-icon fa fa-home home-icon"></i>
								Beranda
							</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class="page-content">

					<?php $this->load->view($konten) ?>
					
					</div><!-- /.page-content -->


				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Desa Tanimulya</span> &copy; 2016
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->
		<script src="<?php echo base_url() ?>assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery.ui.touch-punch.min.js"></script>

		<!-- ace scripts -->
		<script src="<?php echo base_url() ?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/ace.min.js"></script>

	
	</body>
</html>
