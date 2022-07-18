<!-- Content Header (Page header) -->
<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="breadcrumb-item text-primary"><b>Units</b>
						<small class="breadcrumb-item active">Satuan Barang</small>
					</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item">
							<a href="#" class="nav-icon fas fa-tachometer-alt text-primary"></a>
						</li>
						<li class="breadcrumb-item active">Products</li>
						<li class="breadcrumb-item active">Units</li>
					</ol>
				</div>
			</div>
		</div>
</section>

<!-- Main content -->
<?php $this->view('message') ?>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title"><b>Data Units</b></h3>
						<div class="float-sm-right">
							<a href="<?=site_url('unit/add')?>" class="btn btn-primary">
								<i class="fas fa-plus"></i> Create
							</a>
						</div>
					</div>

					<div class="card-body pad table-responsive">
						<table class="table table-bordered table-striped" id="table1">	
							<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach($row->result() as $key => $data) { ?>
								<tr>
									<td style="width:5%;"><?=$no++?>.</td>
									<td><?=$data->name?></td>
									<td class="text-center" width="200px">
										<a href="<?=site_url('unit/edit/'.$data->unit_id)?>" class="btn btn-primary btn-xs">
											<i class="fas fa-edit"></i> Edit
										</a>
										<a href="<?=site_url('unit/delete/'.$data->unit_id)?>" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-danger btn-xs">
											<i class="fas fa-trash"></i> Delete
										</a>
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