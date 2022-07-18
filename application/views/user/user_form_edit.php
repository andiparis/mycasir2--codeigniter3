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
						<h3 class="card-title"><b>Edit Users</b></h3>
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
								<form action="" method="post">
									<div class="form-group has-error">
										<label>Name *</label>
										<input type="hidden" name="user_id" value="<?=$row->user_id?>">
										<input type="text" name="fullname" value="<?=$this->input->post('fullname') ?? $row->name?>" class="form-control">
										<span class="help-block"><?=form_error('fullname')?></span>
									</div>
									<div class="form-group">
										<label>Username *</label>
										<input type="text" name="username" value="<?=$this->input->post('username') ?? $row->username?>" class="form-control">
										<?=form_error('username')?>
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control">
										<?=form_error('password')?>
									</div>
									<div class="form-group">
										<label>Password Confirmation</label>
										<input type="password" name="passconf" class="form-control">
										<?=form_error('passconf')?>
									</div>
									<div class="form-group">
										<label>Level</label>
										<select name="level" class="form-control">
											<?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
											<option value="1">Admin</option>
											<option value="2" <?=$level == 2 ? 'selected' : null?>>Kasir</option>
										</select>
										<?=form_error('level')?>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-success">
											<i class="fas fa-paper-plane">Save</i>
										</button>
										<button type="reset" class="btn btn-default">
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