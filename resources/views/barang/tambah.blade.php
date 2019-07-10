@extends('layouts.header')

@section('title','Input Barang Sembako')

@section('content')
<div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Tambah Data Barang Sembako
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
        		<form method="post" action="{{ route('barang.store') }}">
        			{!! csrf_field() !!}
                    <div class="form-group">
                        <label for="input3" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nm_barang" id="input3" value="{{old('nm_barang')}}" required>
                    </div>
                    <div class="form-group">
                        <label for="select2" class="form-label">Jenis</label>
                        <select class="form-control" name="id_jenis" required>
                            @foreach($jenis as $aka)
                            <option value="{{ $aka->id }}">{{ $aka->jenis }}</option>
                            @endforeach
                        </select>
                    </div>
        			<button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('barang.index') }}" class="btn btn-default">Kembali</a>
        		</form>
        	</div>
        </div>
    </div>
</div>
@endsection
