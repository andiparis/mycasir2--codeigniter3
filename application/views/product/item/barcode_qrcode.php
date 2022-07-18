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
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h3 class="card-title"><b>Barcode Generator</b></h3>
						<div class="float-sm-right">
							<a href="<?=site_url('item')?>" class="btn btn-warning">
								<i class="fas fa-undo"></i> Back
							</a>
						</div>
					</div>

					<div class="card-body pad table-responsive">
						<?php
						$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
						echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '">';
						?>
						<br>
						<?=$row->barcode?>
						<br><br>
						<a href="<?=site_url('item/barcode_print/'.$row->item_id)?>" target="_blank" class="btn btn-secondary btn-sm">
							<i class="fas fa-print"></i> Print
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>