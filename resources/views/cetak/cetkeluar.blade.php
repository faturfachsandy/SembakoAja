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
		<th>Tanggal </th>
		<th>Nama Barang </th>
		<th>Status </th>
		<th width="200">Keterangan </th>
		<th>Jumlah </th>
	</tr>
	<?php $total = 0; ?>
	@foreach($aksi as $b)
	<tr>
		<?php $no++; ?>
		<td align="center"> {{$no}} </td>
		<td class="mar"> {{$b->tanggal}} </td>
		<td class="mar"> {{$b->barang->nama_barang}} </td>
		<td class="mar"> {{$b->status}} </td>
		<td class="mar"> {{$b->keterangan}} </td>
		<td class="mar"> {{$b->sum_stok}} </td>
	</tr>
	<?php $total += $b->sum_stok; ?>
	@endforeach
	<tr>
		<td colspan="5" align="right" class="mar">Total : </td>
		<td class="mar"> {{$total}} </td>
	</tr>
</table>
<script type="text/javascript">
	window.print();
</script>