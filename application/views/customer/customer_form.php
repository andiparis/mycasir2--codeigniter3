<!-- Content Header (Page header) -->
<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="breadcrumb-item text-success"><b>Customers</b>
						<small class="breadcrumb-item active">Pelanggan</small>
					</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item">
							<a href="#" class="nav-icon fas fa-tachometer-alt text-success"></a>
						</li>
						<li class="breadcrumb-item active">Customers</li>
					</ol>
				</div>
			</div>
		</div>
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-success card-outline">
					<div class="card-header">
						<h3 class="card-title"><b><?=ucfirst($page)?> Customer</b></h3>
						<div class="float-sm-right">
							<a href="<?=site_url('customer')?>" class="btn btn-warning">
								<i class="fas fa-undo"></i> Back
							</a>
						</div>
					</div>

					<div class="card-body pad table-responsive">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<form action="<?=site_url('customer/process')?>" method="post">
									<div class="form-group">
										<label>Customer Name *</label>
										<input type="hidden" name="id" value="<?=$row->customer_id?>">
										<input type="text" name="customer_name" value="<?=$row->name?>" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Gender * </label>
										<select name="gender" class="form-control" required>
											<option value="">- Pilih -</option>
											<option value="L" <?=$row->gender == 'L' ? 'selected' : ''?>>Laki-laki</option>
											<option value="P" <?=$row->gender == 'P' ? 'selected' : ''?>>Perempuan</option>
										</select>
									</div>
									<div class="form-group">
										<label>Phone *</label>
										<input type="number" name="phone" value="<?=$row->phone?>" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Address *</label>
										<textarea name="address" class="form-control" required><?=$row->address?></textarea>
									</div>
									<div class="form-group">
										<button type="submit" name="<?=$page?>" class="btn btn-success">
											<i class="fas fa-paper-plane">Save</i>
										</button>
										<button type="reset" class="btn btn-secondary">
											Reset
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>