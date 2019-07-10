@extends('layouts.header')

@section('title','Data Jenis')

@section('content')
<div class="col-md-12">
	@if(session('msg'))
		<div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ session('msg') }}</div>
	@elseif(session('msgx'))
		<div class="foxlabel-alert foxlabel-alert-icon alert6"> <i class="fa fa-ban"></i> <a href="#" class="closed">&times;</a> {{ session('msgx') }}</div>
	@endif
	<div class="panel panel-default">
		<a href="{{ route('jenis.create') }}" class="btn btn-default"><i class="fa fa-plus-circle"></i>Tambah Data</a>
		<br><br>
	    <div class="panel-title"> Data Jenis </div>
	    <div class="panel-body table-responsive">
	        <table id="example0" class="table display">
	            <thead>
	                <tr>
	                    <th width="30">No.</th>
	                    <th>Nama Jenis Sembako</th>
	                    <th style="text-align: right;">Action</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@foreach($jenis as $ka)
	            	<?php $no++ ?>
	            	<tr>
		            	<td>{{ $no }}</td>
		            	<td>{{ $ka->jenis }}</td>
		            	<td align="right">
		            		<form action="{{ route('jenis.destroy', $ka->id) }}" method="post">
		            			{{ csrf_field() }}
								{{ method_field('DELETE') }}
		            		<a href="{{ route('jenis.edit', $ka->id) }}" class="btn btn-option2"><i class="fa fa-edit"></i>Edit</a>
								<button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ?')"><i class="fa fa-trash"></i>Delete</button>
		            		</form>
		            	</td>
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
