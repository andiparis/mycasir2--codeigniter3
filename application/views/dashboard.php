<!-- Content Header (Page header) -->
<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="breadcrumb-item text-info"><b>Dashboard</b>
						<small class="breadcrumb-item active">Control Panel</small>
					</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item">
							<a href="#" class="nav-icon fas fa-tachometer-alt"></a>
						</li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
			</div>
		</div>
</section>

<section class="content">
	<div class="row">			
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-blue">
					<i class="fas fa-th"></i>
				</span>
				<div class="info-box-content">
					<span class="info-box-text">Items</span>
					<span class="info-box-number"><?=$this->fungsi->count_item()?></span>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red">
					<i class="fas fa-truck"></i>
				</span>
				<div class="info-box-content">
					<span class="info-box-text">Suppliers</span>
					<span class="info-box-number"><?=$this->fungsi->count_supplier()?></span>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green">
					<i class="fas fa-users"></i>
				</span>
				<div class="info-box-content">
					<span class="info-box-text">Customers</span>
					<span class="info-box-number"><?=$this->fungsi->count_customer()?></span>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow">
					<i class="fas fa-user-plus"></i>
				</span>
				<div class="info-box-content">
					<span class="info-box-text">Users</span>
					<span class="info-box-number"><?=$this->fungsi->count_user()?></span>
				</div>
			</div>
		</div>
	</div>
</section>