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
						<h3 class="card-title"><b>Data Users</b></h3>
						<div class="float-sm-right">
							<a href="<?=site_url('user/add')?>" class="btn btn-primary">
								<i class="fas fa-user-plus"></i> Create
							</a>
						</div>
					</div>

					<div class="card-body pad table-responsive">
						<table class="table table-bordered table-striped" id="table1">	
							<thead>
								<tr>
									<th>#</th>
									<th>Username</th>
									<th>Name</th>
									<th>Level</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach($row->result() as $key => $data) { ?>
								<tr>
									<td style="width:5%;"><?=$no++?>.</td>
									<td><?=$data->username?></td>
									<td><?=$data->name?></td>
									<td><?=$data->level == 1 ? "Admin" : "Kasir"?></td>
									<td class="text-center" width="200px">
										<form action="<?=site_url('user/delete')?>" method="post">
											<a href="<?=site_url('user/edit/'.$data->user_id)?>" class="btn btn-primary btn-xs">
												<i class="fas fa-edit"></i> Edit
											</a>
											<input type="hidden" name="user_id" value="<?=$data->user_id?>">
											<button onclick="return confirm('Apakah anda yakin ?')" class="btn btn-danger btn-xs">
						    					<i class="fas fa-trash"></i> Delete
						    				</button>
						    			</form>
									</td>
								</tr>
								<?php
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>