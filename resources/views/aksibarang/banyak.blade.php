@extends('layouts.header')

@section('title','Aksi Barang' )

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
        	<div class="panel-title"> Aksi Barang
                @if($id == 1)
                 Masuk
                @else
                 Keluar
                @endif
        		<ul class="panel-tools">
        			<li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
        			<li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
        			<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
        		</ul>
        	</div>
            <form action="{{ route('storebanyak', $id) }}" method="post">
                {!! csrf_field() !!}
               <div class="panel-body table-responsive">
                  <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <td width="30">No. </td>
                            <td>Jenis </td>
                            <td>Barang </td>
                            <td width="100">Stok </td>
                            <td width="250">Jumlah Barang </td>
                            @if($id == 2)
                            <td width="250">Keterangan </td>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        @for($i=0; $i < count($data); $i++)
                        <?php $no++; ?>
                        <tr>
                            <input type="hidden" name="id[]" value="{{$data[$i]->id}}">
                            <td>{{ $no }}</td>
                            <td>{{$data[$i]->jenis->jenis}}</td>
                            <td>{{$data[$i]->nama_barang}}</td>
                            <td>{{$data[$i]->stok}}</td>
                            <td>
                                @if($id == 2)
                                <input type="number" name="sum_stok[]" min="1" max="{{$data[$i]->stok}}" class="form-control" value="{{ $data[$i]->stok }}" required>
                                @else
                                <input type="number" name="sum_stok[]" min="1" class="form-control" value="{{$data[$i]->stok }}" required>
                                @endif
                            </td>
                            @if($id == 2)
                            <td>
                                <input type="text" name="ket[]" class="form-control">
                            </td>
                            @endif
                        </tr>
                        @endfor
                    </tbody>
                    <tfoot>
                        <td colspan="3" align="right">Tanggal : </td>
                        <td align="right">
                            <div class="form-group">
                                <input type="date" value="{{date('Y-m-d')}}" name="tanggal" class="form-control">
                            </div>
                        </td>
                        <td {{($id == 2) ? 'colspan="2"' : ''}} align="center">
                            <a href="{{ route(($id == 1) ? 'barangmasuk' : 'barangkeluar') }}" class="btn btn-default">Kembali</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </td>
                    </tfoot>
                </table>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
