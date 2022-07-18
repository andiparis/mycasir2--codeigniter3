<?php $no = 1;
	if($cart->num_rows() > 0) {
		foreach ($cart->result() as $c => $data) { ?>
			<tr>
				<td><?=$no++?>.</td>
				<td><?=$data->barcode?></td>
				<td><?=$data->item_name?></td>
				<td class="text_right"><?=$data->cart_price?></td>
				<td class="text_right"><?=$data->qty?></td>
				<td class="text_right"><?=$data->discount_item?></td>
				<td class="text_right" id="total"><?=$data->total?></td>
				<td class="text_right" width="160px">
					<button id="update_cart" data-toggle="modal" data-target="#modal-item-edit"
					data-cartid="<?=$data->cart_id?>"
					data-barcode="<?=$data->barcode?>"
					data-product="<?=$data->item_name?>"
					data-price="<?=$data->cart_price?>"
					data-qty="<?=$data->qty?>"
					data-discount="<?=$data->discount_item?>"
					data-total="<?=$data->total?>"
					class="btn btn-xs btn-primary">
						<i class="fas fa-edit"></i> Edit
					</button>
					<button id="delete_cart" data-cartid="<?=$data->cart_id?>" class="btn btn-xs btn-danger">
						<i class="fas fa-trash"></i> Delete
					</button>
				</td>
			</tr>
		<?php
		}
	} else {
		echo '<tr>
			<td colspan="8" class="text-center">Tidak ada item</td>
		</tr>';
	} 
?>