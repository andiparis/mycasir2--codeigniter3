<!-- Content Header (Page header) -->
<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="breadcrumb-item text-primary"><b>Items</b>
						<small class="breadcrumb-item active">Data Barang</small>
					</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item">
							<a href="#" class="nav-icon fas fa-tachometer-alt text-primary"></a>
						</li>
						<li class="breadcrumb-item active">Products</li>
						<li class="breadcrumb-item active">Items</li>
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
						<h3 class="card-title"><b>Data Produk Item</b></h3>
						<div class="float-sm-right">
							<a href="<?=site_url('item/add')?>" class="btn btn-primary">
								<i class="fas fa-plus"></i> Create Product Item
							</a>
						</div>
					</div>

					<div class="card-body pad table-responsive">
						<table class="table table-bordered table-striped" id="table1">	
							<thead>
								<tr>
									<th>#</th>
									<th>Barcode</th>
									<th>Name</th>
									<th>Category</th>
									<th>Unit</th>
									<th>Price</th>
									<th>Discount(%)</th>
									<th>Stock</th>
									<th>Image</th>
									<th>Action</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function() {
		$('#table1').DataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": {
				"url": "<?=site_url('item/get_ajax')?>",
				"type": "POST"
			},
			"columnDefs": [
				{
					"targets": [5, 6, 7],
					"className": 'text-right'
				},
				{
					"targets": [7, 8, -1],
					"className": 'text-center'
				},
				{
					"targets": [0, 8, -1],
					"orderable": false
				}
			]
		} )
	} )
</script>