<!-- Content Header (Page header) -->
<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="breadcrumb-item text-warning"><b>Users</b>
						<small class="breadcrumb-item active">Pengguna</small>
					</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item">
							<a href="#" class="nav-icon fas fa-tachometer-alt text-warning"></a>
						</li>
						<li class="breadcrumb-item active">Users</li>
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
				<div class="card card-warning card-outline">
					<div class="card-header">
						<h3 class="card-title"><b>Add Users</b></h3>
						<div class="float-sm-right">
							<a href="<?=site_url('user')?>" class="btn btn-warning">
								<i class="fas fa-undo"></i> Back
							</a>
						</div>
					</div>

					<div class="card-body pad table-responsive">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<?php // echo validation_errors(); ?>
								<form action="" method="post" class="center">
									<div class="form-group <?=form_error('fullname') ? 'error' : null?>">
										<label>Name *</label>
										<input type="text" name="fullname" value="<?=set_value('fullname')?>" class="form-control">
										<span class="help-block"><?=form_error('fullname')?></span>
									</div>
									<div class="form-group">
										<label>Username *</label>
										<input type="text" name="username" value="<?=set_value('username')?>" class="form-control">
										<?=form_error('username')?>
									</div>
									<div class="form-group">
										<label>Password *</label>
										<input type="password" name="password" class="form-control">
										<?=form_error('password')?>
									</div>
									<div class="form-group">
										<label>Password Confirmation *</label>
										<input type="password" name="passconf" class="form-control">
										<?=form_error('passconf')?>
									</div>
									<div class="form-group">
										<label>Level *</label>
										<select name="level" class="form-control">
											<option value="">- Pilih -</option>
											<option value="1" <?=set_value('level') == 1 ? "selected" : null?>>Admin</option>
											<option value="2" <?=set_value('level') == 2 ? "selected" : null?>>Kasir</option>
										</select>
										<?=form_error('level')?>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success">
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