<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">
	<table>
		<tr>
			<td>Kode</td>
			<td>Nama</td>
			<td>Harga</td>
			<td>Kuantitas</td>
		</tr>
<?php
	foreach ($listing as $fieldkey => $data) {
?>
		<tr>
			<td><?php echo $data['barang_kode']; ?></td>
			<td><?php echo $data['barang_nama']; ?></td>
			<td><?php echo $data['barang_harga']; ?></td>
			<td><?php echo $data['stock_quantity']; ?></td>
		</tr>
<?php
	}
?>
	</table>
</div>

