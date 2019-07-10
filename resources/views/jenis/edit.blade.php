@extends('layouts.header')

@section('title','Edit Jenis')

@section('content')
<div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Edit Data Jenis Sembako
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
        		<form method="post" action="{{ route('jenis.update', $jenis->id ) }}">
        			{!! csrf_field() !!}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="input3" class="form-label">Nama Jenis</label>
                        <input type="text" class="form-control" name="nm_jenis" id="input3" value="{{ $jenis->jenis }}" required>
                    </div>
        			<button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('jenis.index') }}" class="btn btn-default">Kembali</a>
        		</form>
        	</div>
        </div>
    </div>
</div>
@endsection
