@extends('layouts.header')

@section('title','Home')

@section('content')
<div class="col-md-12">
	<div class="panel panel-default">
		<a href="{{ route('jenis.create') }}" class="btn btn-default"><i class="fa fa-plus-circle"></i>Tambah Data</a>
		<br><br>
	    <div class="panel-title"> DataTables </div>
	    <div class="panel-body table-responsive">
	        <table id="example0" class="table display">
	            <thead>
	                <tr>
	                    <th width="30">No.</th>
	                    <th>Nama Jenis Sembako</th>
	                    <th>Action</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@foreach($jenis as $ka)
	            	<?php $no++ ?>
	            	<tr>
		            	<td>{{ $no }}</td>
		            	<td>{{ $ka->nama_barang }}</td>
		            	<td>Belum Ada</td>
	            	</tr>
	            	@endforeach
	            </tbody>
	            <tfoot>
	            </tfoot>
	        </table>
	    </div>
	</div>
</div>

<br>

@endsection
