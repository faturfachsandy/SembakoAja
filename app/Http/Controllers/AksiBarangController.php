<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Barang;
use App\Models\AksiBarang;
use Illuminate\Http\Request;

class AksiBarangController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function masuk(Request $request){
        //$sum = AksiBarang::where(['barang_id' => '3', 'status' => 'keluar'])->sum('sum_stok');
        //dd($sum);

        if ($request->isMethod("POST")) {
            $tgl = $request->tanggal;
            $cari = ['status' => 'masuk', 'tanggal' => $tgl];
        }else{
            $tgl = date('Y-m-d');
            $cari = ['status' => 'masuk', 'tanggal' => $tgl]; 
        }
        
        $no = 0;
        $masuk = AksiBarang::where($cari)->get();

        return view('aksibarang/masuk', compact('masuk', 'no', 'tgl'));
    }

    public function keluar(Request $request){
        
        if ($request->isMethod("POST")) {
            $tgl = $request->tanggal;
            $cari = ['status' => 'keluar', 'tanggal' => $tgl];
        }else{
            $tgl = date('Y-m-d');
            $cari = ['status' => 'keluar', 'tanggal' => $tgl]; 
        }
        
        $no = 0;
        $keluar = AksiBarang::where($cari)->get();
        return view('aksibarang/keluar', compact('keluar', 'no', 'tgl'));
    }

    public function barang($id){
        $barang = Barang::orderBy('jenis_id', 'asc')->get();
        $no = 0;
        return view('aksibarang/barang', compact('barang', 'no', 'id'));
    }

    public function create($i, $id){
        if ($i == 1)  $status = 'masuk';
        else $status = 'keluar';
        $barang = Barang::find($id);
        return view('aksibarang/tambah', compact('barang', 'status'));
    }

    public function store(Request $request){
        $id = Auth::user()->id;

        if ($request->status == 'masuk') {
            $ket = '-';
            $hasil = $request->oldstok + $request->sum_stok;
        }else{
            $ket = $request->ket;
            $hasil = $request->oldstok - $request->sum_stok;
        }
        Barang::find($request->idb)->update([
            'stok' => $hasil
        ]);

        $anu = AksiBarang::Create([
            'users_id' => $id,
            'barang_id' => $request->idb,
            'tanggal' => $request->tanggal,
            'sum_stok' => $request->sum_stok,
            'status' => $request->status,
            'keterangan' => $ket
        ]);

        if ($request->status == 'masuk') return redirect()->route('barangmasuk')->with('msg', 'Data Berhasil Di Input');
        else return redirect()->route('barangkeluar')->with('msg', 'Data Berhasil Di Input');
    }

    public function hapus($i, $id)
    {
        $aksi = AksiBarang::find($id);
        $barang = Barang::find($aksi->barang_id);
        
        if ($i == 1) {
            $hasil = $barang->stok - $aksi->sum_stok; 
        }elseif($i == 2){
            $hasil = $barang->stok + $aksi->sum_stok;
        }

        if ($hasil <= -1) {
            return redirect()->route('barangmasuk')->with('msg', 'Data Tidak Dapat Dihapus Karena stok kurang!!');
        }else{
            Barang::find($aksi->barang_id)->update([
                'stok' => $hasil
            ]);
            AksiBarang::destroy($id);
            if ($i == 1) {
                $kata = 'History Barang Masuk Telah Di Hapus';
                $arah = 'barangmasuk';
            }else{
                $kata = 'History Barang Keluar Telah Di Hapus';
                $arah = 'barangkeluar';
            }
                return redirect()->route($arah)->with('msg', $kata);
        }
    }

    public function banyak(Request $request, $id){
        if (is_null($request->cek)) {
            return redirect()->route('barangcreate', $id);
        }
        for ($i=0; $i < count($request->cek); $i++) { 
            $data = Barang::find($request->cek);
        }
        return view('aksibarang.banyak', compact('data', 'id'));
    }

    public function storebanyak(Request $request, $id){
        $user = Auth::user()->id;
        for ($i=0; $i < count($request->sum_stok); $i++){
            $barang = Barang::find($request->id[$i]);
            if ($id == 1) {
                $ket = '-';
                $hasil = $barang->stok + $request->sum_stok[$i];
            }else{
                $ket[$i] = $request->ket[$i];
                $hasil = $barang->stok - $request->sum_stok[$i];
            }
            $barang->stok = $hasil;
            $barang->save();
            $barang = null;
        }
        for ($i=0; $i < count($request->sum_stok); $i++){
            if ($id == 1) {
                $anu = AksiBarang::Create([
                    'users_id' => $user,
                    'barang_id' => $request->id[$i],
                    'tanggal' => $request->tanggal,
                    'sum_stok' => $request->sum_stok[$i],
                    'status' => 'masuk',
                    'keterangan' => $ket
                ]);
            }else{
                $anu = AksiBarang::Create([
                    'users_id' => $user,
                    'barang_id' => $request->id[$i],
                    'tanggal' => $request->tanggal,
                    'sum_stok' => $request->sum_stok[$i],
                    'status' => 'keluar',
                    'keterangan' => $ket[$i]
                ]);
            }
        }

        if ($id == 1) $arah = 'barangmasuk';
        else $arah = 'barangkeluar';
        return redirect()->route($arah)->with('msg', 'Data Berhasil Di Input');
    }

}
