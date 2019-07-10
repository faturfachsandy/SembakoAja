<style type="text/css">
	table {
    border-collapse: collapse;
	}

	table, th, td {
	    border: 1px solid black;
	}
	.mar {
		padding: 5px;
	}
</style>
<table style="width: 100%;">
	<tr>
		<th width="30">No. </th>
		<th>Jenis </th>
		<th>Nama Barang </th>
		<th>Stok </th>
	</tr>
	<?php $total = 0; ?>
	@foreach($barang as $b)
	<tr>
		<?php $no++; ?>
		<td align="center"> {{$no}} </td>
		<td class="mar"> {{$b->jenis->jenis}} </td>
		<td class="mar"> {{$b->nama_barang}} </td>
		<td class="mar"> {{$b->stok}} </td>
	</tr>
	<?php $total += $b->stok; ?>
	@endforeach
	<tr>
		<td colspan="3" align="right" class="mar">Total Stok : </td>
		<td class="mar"> {{$total}} </td>
	</tr>
</table>
<script type="text/javascript">
	window.print();
</script>