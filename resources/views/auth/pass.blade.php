@extends('layouts.header')

@section('title','Data Petugas')

@section('content')
<div class="row">
        <div class="col-md-12">
            @if(session('msg'))
                <div class="foxlabel-alert foxlabel-alert-icon alert3"> <i class="fa fa-check"></i> <a href="#" class="closed">&times;</a> {{ session('msg') }}</div>
            @endif
        <div class="panel panel-default">
        	<div class="panel-title"> Edit Password
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
        		<form method="post" action="{{ route('passpet', $user->id ) }}">
        			{!! csrf_field() !!}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="nam" class="form-label">Password Lama</label>
                        <input type="password" class="form-control" name="pass_lama" id="nam" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="username" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" name="pass_baru" id="username" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="pass_confirm" id="no_telp" value="" required>
                    </div>
        			<button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('editpetugas', $user->id) }}" class="btn btn-default">Kembali</a>
        		</form>
        	</div>
        </div>
    </div>
</div>
@endsection
