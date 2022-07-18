<!-- Content Header (Page header) -->
<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="breadcrumb-item text-info"><b>Reports</b>
						<small class="breadcrumb-item active">Laporan</small>
					</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item">
							<a href="#" class="nav-icon fas fa-tachometer-alt text-info	"></a>
						</li>
						<li class="breadcrumb-item active">Reports</li>
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
				<div class="card card-info card-outline">
					<div class="card-header">
						<h3 class="card-title"><b>Data Penjualan</b></h3>
						<div class="float-sm-right">
							<a href="<?=site_url('report')?>" class="btn btn-warning">
								<i class="fas fa-undo"></i> Back
							</a>
						</div>
					</div>
					<div class="card-body pad table-responsive">
						<table class="table table-bordered table-striped" id="table1">	
							<thead>
								<tr>
									<th>#</th>
									<th>No. Invoice</th>
									<th>Date</th>
									<th>Sub Total</th>
									<th>Discount</th>
									<th>Grand Total</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($sale as $key => $data) { ?>
									<tr>
										<td style="width:5%;"><?=$no++?>.</td>
										<td><?=$data->invoice?></td>
										<td><?=id_date($data->date)?></td>
										<td><?=id_currency($data->total_price)?></td>
										<td><?=id_currency($data->discount)?></td>
										<td><?=id_currency($data->final_price)?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>