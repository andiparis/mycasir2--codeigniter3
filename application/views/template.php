<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Tinky Winky Baby Shop</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Data Tables -->
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>
<!-- <?=$this->uri->segment(1) == 'sale' ? 'sidebar-collapse' : null?> -->
<body class="hold-transition sidebar-mini ">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>
		    <!-- Right navbar links -->
		    <ul class="navbar-nav ml-auto">
				<!-- User Account -->
				<li class="nav-item dropdown user user-menu">
					<a href="#" class="nav-link" data-toggle="dropdown">
						<img src="<?=base_url()?>assets/dist/img/user.png" class="user-image">
						<span class="dropdown-toggle"><?=ucfirst($this->fungsi->user_login()->username)?></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-header">
							<img src="<?=base_url()?>assets/dist/img/user.png" class="img-circle">
							<p><?=$this->fungsi->user_login()->name?></p>
						</li>
						<li class="user-footer">
							<a href="<?=site_url('auth/logout')?>" class="btn btn-danger float-sm-right">Sign Out</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">    

		<!-- Sidebar -->
			<div class="sidebar">

				<!-- Sidebar user (optional) -->
	      		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
	        		<div class="image">
						<img src="<?=base_url()?>assets/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block"><?=ucfirst($this->fungsi->user_login()->username)?></a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-header">MAIN NAVIGATION</li>
	          			<li class="nav-item">
	            			<a href="<?=site_url('dashboard')?>" class="nav-link <?=$this->uri->segment(1) == 'dashboard' ? 'active' : null?>">
	              				<i class="nav-icon fas fa-tachometer-alt"></i>
	              				<p>Dashboard</p>
	            			</a>
	          			</li>
						<?php if($this->fungsi->user_login()->level == 1) { ?>
	          			<li class="nav-item">
	            			<a href="<?=site_url('supplier')?>" class="nav-link <?=$this->uri->segment(1) == 'supplier' ? 'active' : null?>">
	              				<i class="nav-icon fas fa-truck"></i>
	              				<p>Suppliers</p>
	              			</a>
						</li>
						<?php } ?>
						<li class="nav-item">
							<a href="<?=site_url('customer')?>" class="nav-link <?=$this->uri->segment(1) == 'customer' ? 'active' : null?>">
								<i class="nav-icon fas fa-users"></i>
								<p>Customers</p>
							</a>
						</li>
						<?php if($this->fungsi->user_login()->level == 1) { ?>
	          			<li class="nav-item has-treeview <?=
						  	$this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'item'? 'menu-open' : null?>">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-archive"></i>
								<p>Products
									<i class="right fas fa-angle-left"></i>
	              				</p>
	            			</a>
	            			<ul class="nav nav-treeview">
	              				<li class="nav-item">
	                				<a href="<?=site_url('category')?>" class="nav-link <?=$this->uri->segment(1) == 'category' ? 'active' : null?>">
	                  					<i class="far fa-circle nav-icon"></i>
	                  					<p>Categories</p>
	                				</a>
	              				</li>
	              				<li class="nav-item">
	                				<a href="<?=site_url('unit')?>" class="nav-link <?=$this->uri->segment(1) == 'unit' ? 'active' : null?>">
	                  					<i class="far fa-circle nav-icon"></i>
	                  					<p>Units</p>
	                				</a>
	              				</li>
	              				<li class="nav-item">
	                				<a href="<?=site_url('item')?>" class="nav-link <?=$this->uri->segment(1) == 'item' ? 'active' : null?>">
	                  					<i class="far fa-circle nav-icon"></i>
	                  					<p>Items</p>
	                				</a>
	              				</li>
	            			</ul>
	          			</li>
						<?php } ?>
	          			
						  <li class="nav-item has-treeview <?=$this->uri->segment(1) == 'sale' || $this->uri->segment(2) == 'in' || $this->uri->segment(2) == 'out' ? 'menu-open' : null?>">
	            			<a href="#" class="nav-link">
	              				<i class="nav-icon fas fa-shopping-cart"></i>
	              				<p>Transactions
	                				<i class="fas fa-angle-left right"></i>
	              				</p>
	            			</a>
	            			<ul class="nav nav-treeview">
	              				<li class="nav-item">
	                				<a href="<?=site_url('sale')?>" class="nav-link <?=$this->uri->segment(1) == 'sale' ? 'active' : null?>">
	                  					<i class="far fa-circle nav-icon"></i>
	                  					<p>Sales</p>
	                				</a>
	              				</li>
	              				<li class="nav-item">
	                				<a href="<?=site_url('stock/in')?>" class="nav-link <?=$this->uri->segment(2) == 'in' ? 'active' : null?>">
	                  					<i class="far fa-circle nav-icon"></i>
	                  					<p>Stock In</p>
	                				</a>
	              				</li>
	              				<li class="nav-item">
	                				<a href="<?=site_url('stock/out')?>" class="nav-link <?=$this->uri->segment(2) == 'out' ? 'active' : null?>">
	                  					<i class="far fa-circle nav-icon"></i>
	                  					<p>Stock Out</p>
	                				</a>
	              				</li>
	            			</ul>
	          			</li>

						<?php if($this->fungsi->user_login()->level == 1) { ?>
	          			<li class="nav-item">
	            			<a href="<?=site_url('report')?>" class="nav-link <?=$this->uri->segment(1) == 'report' ? 'active' : null?>">
	              				<i class="nav-icon fas fa-chart-pie"></i>
	              				<p>Reports</p>
	            			</a>
	              		</li>
	          			<li class="nav-header">SETTINGS</li>
	          			<li class="nav-item">
	            			<a href="<?=site_url('user')?>" class="nav-link <?=$this->uri->segment(1) == 'user' ? 'active' : null?>">
	              				<i class="nav-icon fas fa-user"></i>
	              				<p>Users</p>
	            			</a>
	          			</li>
	          			<?php } ?>
	        		</ul>
	      		</nav>
			</div>
		</aside>

		<!-- jQuery -->
		<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>

  		<!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
  			<?php echo $contents ?>
		</div>
		<footer class="main-footer">
    		<div class="float-right d-none d-sm-block">
      			<b>Version</b> 1.0
    		</div>
    		<strong>Copyright &copy; 2022.</strong> All rights reserved.
  		</footer>
  	</div>

	<!-- Bootstrap 4 -->
	<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?=base_url()?>assets/dist/js/demo.js"></script>
	<!-- Data Tables -->
	<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

	<script>
	$(document).ready(function() {
		$('#table1').DataTable()
	} )
	</script>
</body>
</html>
