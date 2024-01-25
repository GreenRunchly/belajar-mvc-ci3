<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content">

<?php
	$barang = $this->db->query('SELECT * FROM tbl_barang;');
	$invoice = $this->db->query('SELECT * FROM tbl_invoice;');
	$barang_terjual = $this->db->query('SELECT * FROM tbl_barang_terjual;');
	$pelanggan = $this->db->query('SELECT * FROM tbl_pelanggan;');
?>
<table>
		<tr>
			<td>Total Barang</td>
			<td>Total Transaksi</td>
			<td>Terjual</td>
			<td>Pelanggan</td>
		</tr>
		<tr>
			<td><span><?php echo count($barang->result_array()); ?></span> Barang</td>
			<td><span><?php echo count($invoice->result_array()); ?></span> Invoice</td>
			<td><span><?php echo count($barang_terjual->result_array()); ?></span> Barang</td>
			<td><span><?php echo count($pelanggan->result_array()); ?></span> Orang</td>
		</tr>
	</table>
</div>

