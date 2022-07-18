<!-- Content Header (Page header) -->
<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="breadcrumb-item text-primary"><b>Stock In</b>
						<small class="breadcrumb-item active">Barang Masuk</small>
					</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item">
							<a href="#" class="nav-icon fas fa-tachometer-alt text-primary"></a>
						</li>
						<li class="breadcrumb-item active">Transaction</li>
						<li class="breadcrumb-item active">Stock In</li>
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
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title"><b>Add Stock In</b></h3>
						<div class="float-sm-right">
							<a href="<?=site_url('stock/in')?>" class="btn btn-warning">
								<i class="fas fa-undo"></i> Back
							</a>
						</div>
					</div>

					<div class="card-body pad table-responsive">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<form action="<?=site_url('stock/process')?>" method="post">
									<div class="form-group">
										<label>Date *</label>
										<input type="date" name="date" value="<?=date('Y-m-d')?>" class="form-control" required>
									</div>
									<div>
										<label for="barcode">Barcode *</label>
									</div>
									<div class="form-group input-group">
										<input type="hidden" name="item_id" id="item_id">
										<input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
										<span class="input-group-btn">
											<button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
												<i class="fas fa-search"></i>
											</button>
										</span>
									</div>
									<div class="form-group">
										<label>Item Name *</label>
										<input type="text" name="item_name" id="item_name" class="form-control" readonly>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-8">
												<label for="unit_name">Item Unit</label>
												<input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
											</div>
											<div class="col-md-4">
												<label for="stock">Initial Stock</label>
												<input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Detail *</label>
										<input type="text" name="detail" class="form-control" placeholder="Kulakan / tambahan / etc" required>
									</div>
									<div class="form-group">
										<label>Supplier</label>
										<select name="supplier" class="form-control">
											<option value="">- Pilih -</option>
											<?php foreach($supplier as $key =>	$data) {
												echo '<option value="'.$data->supplier_id.'">'.$data->name.'</option>';
											} ?>
										</select>
									</div>
									<div class="form-group">
										<label>Qty *</label>
										<input type="number" name="qty" class="form-control" required>
									</div>
									<div class="form-group">
										<button type="submit" name="in_add" class="btn btn-success">
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

<div class="modal fade" id="modal-item">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Select Product Item</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered table-striped" id="table1">
					<thead>
						<tr>
							<th>Barcode</th>
							<th>Name</th>
							<th>Unit</th>
							<th>Price</th>
							<th>Stock</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($item as $key => $data) { ?>
						<tr>
							<td><?=$data->barcode?></td>
							<td><?=$data->name?></td>
							<td><?=$data->unit_name?></td>
							<td class="text-right"><?=id_currency($data->price)?></td>
							<td class="text-right"><?=$data->stock?></td>
							<td class="text-center">
								<button class="btn btn-xs btn-info" id="select"
									data-id="<?=$data->item_id?>"
									data-barcode="<?=$data->barcode?>"
									data-name="<?=$data->name?>"
									data-unit="<?=$data->unit_name?>"
									data-stock="<?=$data->stock?>">
									<i class="fas fa-check"></i> Select
								</button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script >
	$(document).ready(function() 
	{
		$(document).on('click', '#select', function() {
			var item_id = $(this).data('id');
			var barcode = $(this).data('barcode');
			var name = $(this).data('name');
			var unit_name = $(this).data('unit');
			var stock = $(this).data('stock');
			$('#item_id').val(item_id);
			$('#barcode').val(barcode);
			$('#item_name').val(name);
			$('#unit_name').val(unit_name);
			$('#stock').val(stock);
			$('#modal-item').modal('hide');
		})
	})
</script>