@extends('layouts.header')

@section('title','Data Sembako')

@section('content')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-title"> Data Barang Sembako : </div>
		<div class="col-md-6">
			<form method="post" action="{{ route('cetaksem') }}" class="form-horizontal">
			{!! csrf_field() !!}
			<fieldset>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-prepend input-group">
                        	<select class="selectpicker" name="jenis" data-live-search="true">
                        		<option value="">Semua Jenis</option>
                        		@foreach($jenis as $jn)
                                <option value="{{$jn->id}}">{{$jn->jenis}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Cari </button>
                            @if(isset($idjenis))
                            <a href="{{ url('cetak/cetsembako/'.$idjenis) }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Cetak</a>
                            @else
                            <a href="{{ url('cetak/cetsembako/0') }}" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Cetak</a>
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
						<td>Jenis </td>
						<td>Barang </td>
						<td>Stok </td>
					</tr>
				</thead>
				<tbody>
					@foreach($barang as $data)
					<?php $no++; ?>
					<tr>
						<td>{{ $no }}</td>
						<td>{{$data->jenis->jenis}}</td>
						<td>{{$data->nama_barang}}</td>
						<td>{{$data->stok}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection