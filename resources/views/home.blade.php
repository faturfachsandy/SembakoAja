@extends('layouts.header')

@section('title','Home')

@section('content')

<div class="page-header">
    <h1 class="title">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Halaman Untuk Melihat Seluruh Data</li>
    </ol>
</div>

<div class="row">

    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-title"> Barang Masuk Hari Ini </div>
            <div class="panel-body">
                <h1 class="no-margins"><span data-counter="counterup" data-value="{{$masuk}}">0</span></h1>
                <small>Data Barang Masuk</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-title"> Barang Keluar Hari Ini </div>
            <div class="panel-body">
                <h1 class="no-margins"><span data-counter="counterup" data-value="{{$keluar}}">0</span></h1>
                <small>Data Barang Keluar</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-title">
                <span class="pull-right"><i class="fa fa-cube"></i></span> Total Jenis Sembako
            </div>
            <div class="panel-body">
                <h1 class="no-margins"><span data-counter="counterup" data-value="{{$jenis}}">0</span></h1>
                <small>Data Jenis Sembako</small>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-title">
                <span class="pull-right"><i class="fa fa-cubes"></i></span> Total Barang Sembako
            </div>
            <div class="panel-body">
                <h1 class="no-margins"><span data-counter="counterup" data-value="{{$barang}}">0</span></h1>
                <small>Data Barang Sembako</small>
            </div>
        </div>
    </div>

    <div class="col-md-12 padding-b-20" align="center">
        <hr>
        <h4 class="font-title">Data Stok Pada Sembako</h4>
    </div>
    @foreach($sembako as $sem)
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-title">
                <span class="pull-right"><i class="fa fa-cubes"></i></span>{{$sem->nama_barang}} 
            </div>
            <div class="panel-body">
                <h1 class="no-margins"><span data-counter="counterup" data-value="{{$sem->stok}}">0</span></h1>
                <small> Jenis : {{$sem->jenis->jenis}} </small>
            </div>
        </div>
    </div>
    @endforeach

</div>
<!-- Toastr -->
<script src="{{asset('js/toastr/toastr.min.js')}}"></script>
<script src="{{asset('js/toastr/toastr-plugin.js')}}"></script>
@endsection
