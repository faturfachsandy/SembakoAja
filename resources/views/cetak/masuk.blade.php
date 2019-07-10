@extends('layouts.header')

@section('title','Data Sembako')

@section('content')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-title"> Data History Barang Masuk : </div>
		<div class="col-md-6">
			<form method="post" action="{{ route('cetakmas') }}" class="form-horizontal">
			{!! csrf_field() !!}
			<fieldset>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend input-group">
                        	<select class="selectpicker" name="jenis" data-live-search="true">
                        		<option value="">Semua Barang</option>
                        		@foreach($barang as $jn)
                                <option value="{{$jn->id}}">{{$jn->nama_barang}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Cari </button>
                            @if(isset($idbarang))
                            <a href="{{ url('cetak/cetmasuk/'.$idbarang) }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Cetak</a>
                            @else
                            <a href="{{ url('cetak/cetmasuk/0') }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Cetak</a>
                            @endif
                        </div>
                    </div>
                </div>
            </fieldset>
		</form>
		</div>
	</div>
</div>
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-body table-responsive">
			<table class="table table-hover table-striped">
				<thead>
					<tr>
						<td width="30">No. </td>
						<td>Tanggal </td>
						<td>Barang </td>
						<td>Status </td>
						<td>Jumlah </td>
					</tr>
				</thead>
				<tbody>
					@foreach($aksi as $data)
					<?php $no++; ?>
					<tr>
						<td>{{ $no }}</td>
						<td>{{$data->tanggal}}</td>
						<td>{{$data->barang->nama_barang}}</td>
						<td>{{$data->status}}</td>
						<td>{{$data->sum_stok}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection