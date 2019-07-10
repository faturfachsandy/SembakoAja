@extends('layouts.header')

@section('title','Data Petugas')

@section('content')
<div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Edit Informasi Petugas
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
        		<form method="post" action="{{ route('updateuser', $user->id ) }}">
        			{!! csrf_field() !!}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="nam" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="nam" value="{{ $user->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username" value="{{ $user->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp" class="form-label">Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_telp" id="no_telp" value="{{ $user->no_telp }}" required>
                    </div>
                    <div class="form-group">
                        <label for="alama" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alama" value="{{ $user->alamat }}" required>
                    </div>
        			<button type="submit" class="btn btn-primary">Submit</button>
                    @if($user->id == Auth::user()->id)
                    <!-- <a href="{{ route('passpetugas', $user->id) }}" class="btn btn-warning">Ubah Password</a> -->
                    @endif
                    <a href="{{ route('petugas') }}" class="btn btn-default">Kembali</a>
        		</form>
        	</div>
        </div>
    </div>
</div>
@endsection
