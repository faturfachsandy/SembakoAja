@extends('layouts.header')

@section('title','Cari Barang')

@section('content')
<div class="col-md-12">
	<div class="panel panel-default">
		<form action="{{ route('banyak', $id) }}" method="post">
			{!! csrf_field() !!}
			<div class="panel-title"> Data Sembako 
				@if($id == 1)
				Untuk Di Masukkan
				@else
				Untuk Di Keluarkan
				@endif
			</div>
			<div class="panel-body table-responsive">
				<table id="example0" class="table display">
					<thead>
						<tr>
							<th width="30">No.</th>
							<th>Nama Barang</th>
							<th>Jumlah Stok</th>
							<th width="100">Jenis</th>
							<th style="text-align: right;">Action </th>
							<th width="30">Check</th>
						</tr>
					</thead>
					<tbody>
						@foreach($barang as $ka)
						<?php $no++ ?>
						@if($ka->stok == 0 && $id == 2)
						@else
						<tr>
							<td>{{ $no }}</td>
							<td>{{ $ka->nama_barang }}</td>
							<td>{{ $ka->stok }}</td>
							<td>{{ $ka->jenis->jenis }}</td>
							<td align="right">
								@if($id == 1)
								<a href="{{ url('/sembako/input/1/'.$ka->id) }}" class="btn btn-option2"><i class="fa fa-check"></i>Pilih</a>
								@else
								<a href="{{ url('/sembako/input/2/'.$ka->id) }}" class="btn btn-option2"><i class="fa fa-check"></i>Pilih</a>
								@endif
							</td>
							<td>
								<div class="checkbox checkbox-info">
                                    <input id="checkbox104{{$no}}" type="checkbox" name="cek[]" value="{{$ka->id}}">
                                    <label for="checkbox104{{$no}}"> Pilih </label>
                                </div>
							</td>
						</tr>
						@endif
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td colspan="6" align="right">
								<a href="{{ route(($id == 1) ? 'barangmasuk' : 'barangkeluar') }}" class="btn btn-default">Kembali</a>
								<button type="submit" class="btn btn-option2"><i class="fa fa-check"></i>Pilih Yang Di Check</button>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</form>
	</div>
</div>

<br>

@endsection