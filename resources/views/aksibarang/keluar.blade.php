@extends('layouts.header')

@section('title','Barang Keluar')

@section('content')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-title"> History Barang Keluar Tanggal :  {{$tgl}} </div>
		<div class="col-md-4">
		<form method="post" action="{{ route('barangkeluar') }}" class="form-horizontal">
			{!! csrf_field() !!}
			<fieldset>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend input-group"> <span class="add-on input-group-addon"><i class="fa fa-calendar"></i></span>
                            <input type="date" name="tanggal" id="date-picker" class="form-control" value="{{$tgl}}"/>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Cari</button>
                        </div>
                    </div>
                </div>
            </fieldset>
		</form>
		</div>
	</div>
</div>
<div class="col-md-12">
	@if(session('msg'))
		<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ session('msg') }}</div>
	@endif
	<div class="panel panel-default">
		<a href="{{ url('/sembako/barang/2') }}" class="btn btn-default"><i class="fa fa-plus-circle"></i>Output Barang</a>
		<br><br>
		<div class="panel-body table-responsive">
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<td width="30">No. </td>
						<td>Tanggal </td>
						<td>Jenis </td>
						<td>Barang </td>
						<td>Stok Keluar </td>
						<td width="200">Keterangan </td>
						<td width="250">Action </td>
					</tr>
				</thead>
				<tbody>
					@foreach($keluar as $data)
					<?php $no++; ?>
					<tr>
						<td>{{ $no }}</td>
						<td>{{$data->tanggal}}</td>
						<td>{{$data->barang->jenis->jenis}}</td>
						<td>{{$data->barang->nama_barang}}</td>
						<td>{{$data->sum_stok}}</td>
						<td>{{$data->keterangan}}</td>
						<td>
							<form action="{{ url('/sembako/hapus/2/'.$data->id) }}" method="post">
		            			{{ csrf_field() }}
								{{ method_field('DELETE') }}
		            		<a href="{{url('/sembako/hapus/'. $data->id)}}" class="btn btn-option2">
		            			<i class="fa fa-edit"></i>Edit</a>
								<button class="btn btn-danger" onclick="return confirm('Yakin ingin history barang keluar ini ?')"><i class="fa fa-trash"></i>Delete</button>
		            		</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection