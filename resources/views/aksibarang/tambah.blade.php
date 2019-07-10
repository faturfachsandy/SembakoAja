@extends('layouts.header')

@section('title','Barang '.$status)

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Barang {{$status}}
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
        	<div class="panel-body">
        		<form method="post" action="{{ route('storeaksi') }}">
        			{!! csrf_field() !!}
                    <h4>Info Barang</h4>
                    <p>
                        Jenis : {{$barang->jenis->jenis}} <br> Nama Barang : {{$barang->nama_barang}} <br> Stok : {{$barang->stok}} 
                    </p>
                    <input type="hidden" name="status" value="{{$status}}">
                    <input type="hidden" name="oldstok" value="{{$barang->stok}}">
                    <input type="hidden" name="idb" value="{{$barang->id}}">
                    <div class="form-group">
                        <label for="select2" class="form-label">Jumlah Barang</label>
                        @if($status == 'keluar')
                        <input type="number" name="sum_stok" min="1" max="{{$barang->stok}}" class="form-control" value="{{old('sum_stok')}}" required>
                        @else
                        <input type="number" name="sum_stok" min="1" class="form-control" value="{{old('sum_stok')}}" required>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="select2" class="form-label">Tanggal</label>
                        <input type="date" value="{{date('Y-m-d')}}" name="tanggal" class="form-control">
                    </div>
                    @if($status == 'keluar')
                    <div class="form-group">
                        <label for="select2" class="form-label">Keterangan</label>
                        <input type="text" value="{{old('ket')}}" name="ket" class="form-control">
                    </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Submit</button>
                    @if($status == 'keluar')
                    <a href="{{ route('barangkeluar') }}" class="btn btn-default">Kembali</a>
                    @else
                    <a href="{{ route('barangmasuk') }}" class="btn btn-default">Kembali</a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
