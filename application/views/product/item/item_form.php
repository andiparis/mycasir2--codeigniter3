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
						<h3 class="card-title"><b><?=ucfirst($page)?> Item</b></h3>
						<div class="float-sm-right">
							<a href="<?=site_url('item')?>" class="btn btn-warning">
								<i class="fas fa-undo"></i> Back
							</a>
						</div>
					</div>

					<div class="card-body pad table-responsive">
						<div class="row">
							<div class="col-md-4"></div>
							<div class="col-md-4">
								<?php echo form_open_multipart('item/process') ?>
									<div class="form-group">
										<label>Barcode *</label>
										<input type="hidden" name="id" value="<?=$row->item_id?>">
										<input type="text" name="barcode" value="<?=$row->barcode?>" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="product_name">Product Name *</label>
										<input type="text" name="product_name" id="product_name" value="<?=$row->name?>" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Category *</label>
										<select name="category" class="form-control" required>
											<option value="">- Pilih -</option>
												<?php foreach($category->result() as $key => $data) { ?>
												<option value="<?=$data->category_id?>" <?=$data->category_id == $row->category_id ? "selected" : null?>><?=$data->name?></option>
												<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Unit *</label>
										<select name="unit" class="form-control" required>
											<option value="">- Pilih -</option>
												<?php foreach($unit->result() as $key => $data) { ?>
												<option value="<?=$data->unit_id?>" <?=$data->unit_id == $row->unit_id ? "selected" : null?>><?=$data->name?></option>
												<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label>Price *</label>
										<?php if($page == 'add') { ?>
											<input type="text" name="price" value="<?=$row->price?>" class="form-control" required>
										<?php	
										} else { ?>
											<input type="text" name="price" value="<?=(($row->price) + $row->before_discount)?>" class="form-control" required>
										<?php
										} ?>
									</div>
									<div class="form-group">
										<label>Discount(%)</label>
										<input type="text" name="discount" value="<?=$row->discount?>" class="form-control">
									</div>
									<div class="form-group">
										<label>Image</label>
										<?php if($page == 'edit') {
											if($row->image != null) { ?>
												<div style="margin-bottom: 5px">
													<img src="<?=base_url('uploads/product/'.$row->image)?>" style="width:80%">
												</div>
											<?php
											}
										} ?>
										<input type="file" name="image" class="form-control">
										<small>(Biarkan kosong jika tidak <?=$page == 'edit' ? 'diganti' : 'ada'?>)</small>
									</div>
									<div class="form-group">
										<button type="submit" name="<?=$page?>" class="btn btn-success">
											<i class="fas fa-paper-plane">Save</i>
										</button>
										<button type="reset" class="btn btn-secondary">
											Reset
										</button>
									</div>
								<?php echo form_close() ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>