<!-- Content Header (Page header) -->
<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="breadcrumb-item text-primary"><b>Stock Out</b>
						<small class="breadcrumb-item active">Barang Keluar</small>
					</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item">
							<a href="#" class="nav-icon fas fa-tachometer-alt text-primary"></a>
						</li>
						<li class="breadcrumb-item active">Transaction</li>
						<li class="breadcrumb-item active">Stock Out</li>
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
						<h3 class="card-title"><b>Data Stock Out</b></h3>
						<div class="float-sm-right">
							<a href="<?=site_url('stock/out/add')?>" class="btn btn-primary">
								<i class="fas fa-plus"></i> Add Stock Out
							</a>
						</div>
					</div>

					<div class="card-body pad table-responsive">
						<table class="table table-bordered table-striped" id="table1">	
							<thead>
								<tr>
									<th>#</th>
									<th>Barcode</th>
									<th>Product Item</th>
									<th>Qty</th>
									<th>Detail</th>
									<th>Date</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach($row as $key => $data) { ?>
								<tr>
									<td style="width:5%;"><?=$no++?>.</td>
									<td><?=$data->barcode?></td>
									<td><?=$data->item_name?></td>
									<td class="text-right"><?=$data->qty?></td>
									<td><?=$data->detail?></td>
									<td class="text-center"><?=id_date($data->date)?></td>
									<td class="text-center" width="160px">
										<a id="set_detail" class="btn btn-default btn-xs" 
										data-toggle="modal" data-target="#modal-detail"
										data-barcode="<?=$data->barcode?>"
										data-itemname="<?=$data->item_name?>"
										data-detail="<?=$data->detail?>"
										data-qty="<?=$data->qty?>"
										data-date="<?=id_date($data->date)?>">
											<i class="fas fa-eye"></i> Details
										</a>
										<a href="<?=site_url('stock/out/delete/'.$data->stock_id.'/'.$data->item_id)?>" onclick="return confirm('Apakah anda yakin ?')" class="btn btn-danger btn-xs">
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

<div class="modal fade" id="modal-detail">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Select In Detail</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered no-margin">
					<tbody>
						<tr>
							<th style="width:35%">Barcode</th>
							<td><span id="barcode"></span></td>
						</tr>
						<tr>
							<th>Item Name</th>
							<td><span id="item_name"></span></td>
						</tr>
						<tr>
							<th>Detail</th>
							<td><span id="detail"></span></td>
						</tr>
						<tr>
							<th>Qty</th>
							<td><span id="qty"></span></td>
						</tr>
						<tr>
							<th>Date</th>
							<td><span id="date"></span></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script >
	$(document).ready(function() 
	{
		$(document).on('click', '#set_detail', function() {
			var barcode = $(this).data('barcode');
			var itemname = $(this).data('itemname');
			var detail = $(this).data('detail');
			var qty = $(this).data('qty');
			var date = $(this).data('date');
			$('#barcode').text(barcode);
			$('#item_name').text(itemname);
			$('#detail').text(detail);
			$('#qty').text(qty);
			$('#date').text(date);
		})
	})
</script>