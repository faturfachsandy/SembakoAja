<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Models\Jenis;
use App\Models\Barang;
use App\Models\AksiBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masuk = AksiBarang::where(['status' => 'masuk', 'tanggal' => date('Y-m-d')])->count();
        $keluar = AksiBarang::where(['status' => 'keluar', 'tanggal' => date('Y-m-d')])->count();
        $jenis = Jenis::count();
        $barang = Barang::count();
        $sembako = Barang::orderBy('jenis_id', 'asc')->get();

        return view('home', compact('masuk', 'keluar', 'jenis', 'barang', 'sembako'));
    }

    public function user()
    {
        $user = User::all();
        $no = 0;
        return view('user', compact('user', 'no'));
    }

    public function edituser($id)
    {
        $user = User::find($id);
        return view('edituser', compact('user'));
    }

    public function passuser($id)
    {
        $user = User::find($id);
        if ($user->id != Auth::user()->id) {
            return redirect()->route('editpetugas', $id);
        }
        return view('auth.pass', compact('user'));
    }

    public function updateuser(Request $request, $id)
    {
        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->username,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat
        ]);
        return redirect()->route('petugas')->with('msg', 'Data Petugas Telah di Edit');
    }

    public function pass(Request $request, $id){
        $user = User::find($id);
        $pass_lama = $user->password;
        if (Hash::check($request->pass_lama, $pass_lama)) {
            $user->password = Hash::make($request->pass_baru);
            $user->save();
            return redirect()->route('petugas')->with('msg', 'Password Telah Di Ubah');
        }else{
            return redirect()->route('passpetugas', $user->id)->with('msg', 'Password Lama Tidak Sama');
        }
    }

    public function hapuser($id){
        User::destroy($id);
        return redirect()->route('petugas')->with('msg', 'Petugas telah di Hapus');
    }

    //Data Sembako
    public function datasembako(Request $request){
        $no = 0;
        $jenis = Jenis::all();
        if ($request->isMethod('POST')) {
            $idjenis = $request->jenis;
            if ($idjenis == '') $barang = Barang::orderBy('jenis_id', 'asc')->get();
            else $barang = Barang::where('jenis_id', $idjenis)->get();

            return view('cetak/sembako', compact('barang', 'no', 'jenis', 'idjenis'));
        }else{
            $barang = Barang::orderBy('jenis_id', 'asc')->get();
            return view('cetak/sembako', compact('barang', 'no', 'jenis'));
        }
    }

    public function cetaksembako($id){
        $no = 0;
        if ($id != 0) {
            $barang = Barang::where('jenis_id', $id)->get();
        }else{
            $barang = Barang::orderBy('jenis_id', 'asc')->get();
        }
        return view('cetak/cetsembako', compact('barang', 'no'));
    }
    //Barang
    public function databarang(Request $request){
        $no = 0;
        $barang = Barang::orderBy('jenis_id', 'asc')->get();

        if ($request->isMethod('POST')) {
            $idbarang = $request->jenis;
            if ($idbarang == '') $aksi = AksiBarang::orderBy('tanggal', 'desc')->get();
            else $aksi = AksiBarang::where('barang_id', $idbarang)->orderBy('tanggal', 'desc')->get();

            return view('cetak/barang', compact('barang', 'no', 'aksi', 'idbarang'));            
        }else{
            $aksi = AksiBarang::orderBy('tanggal', 'desc')->get();
            return view('cetak/barang', compact('barang', 'no', 'aksi'));
        }
    }

    public function cetakbarang($id){
        $no = 0;
        if ($id != 0) {
            $aksi = AksiBarang::where('barang_id', $id)->orderBy('tanggal', 'desc')->get();
        }else{
            $aksi = AksiBarang::orderBy('tanggal', 'desc')->get();
        }
        return view('cetak/cetbarang', compact('aksi', 'no'));
    }
    //Data Barang Masuk
    public function datamasuk(Request $request){
        $no = 0;
        $barang = Barang::orderBy('jenis_id', 'asc')->get();
        if ($request->isMethod('POST')) {
            $idbarang = $request->jenis;
            if ($idbarang == '') $aksi = AksiBarang::where('status', 'masuk')->orderBy('tanggal', 'desc')->get();
            else $aksi = AksiBarang::where(['barang_id' => $idbarang, 'status'=>'masuk'])->orderBy('tanggal', 'desc')->get();
            return view('cetak/masuk', compact('barang', 'no', 'aksi', 'idbarang'));  
        }else{
            $aksi = AksiBarang::where('status', 'masuk')->orderBy('tanggal', 'desc')->get();
            return view('cetak/masuk', compact('barang', 'no', 'aksi'));
        }
    }
    public function cetakmasuk($id){
        $no = 0;
        if ($id != 0) {
            $aksi = AksiBarang::where(['barang_id' => $id, 'status'=>'masuk'])->orderBy('tanggal', 'desc')->get();
        }else{
            $aksi = AksiBarang::where('status', 'masuk')->orderBy('tanggal', 'desc')->get();
        }
        return view('cetak/cetmasuk', compact('aksi', 'no'));
    }
    //Data Barang Keluar
    public function datakeluar(Request $request){
        $no = 0;
        $una = 'no';
        $barang = Barang::orderBy('jenis_id', 'asc')->get();
        if ($request->isMethod('POST')) {
            $idbarang = $request->jenis;
            if ($idbarang == '') $aksi = AksiBarang::where('status', 'keluar')->orderBy('tanggal', 'desc')->get();
            else $aksi = AksiBarang::where(['barang_id'=>$idbarang, 'status'=>'keluar'])->orderBy('tanggal', 'desc')->get();
            return view('cetak/keluar', compact('barang', 'no', 'aksi', 'idbarang', 'una'));  
        }else{
            $aksi = AksiBarang::where('status', 'keluar')->orderBy('tanggal', 'desc')->get();
            return view('cetak/keluar', compact('barang', 'no', 'aksi', 'una'));
        }
    }
    public function cetakkeluar($id){
        $no = 0;
        if ($id != 0) {
            $aksi = AksiBarang::where(['barang_id' => $id, 'status'=>'keluar'])->orderBy('tanggal', 'desc')->get();
        }else{
            $aksi = AksiBarang::where('status', 'keluar')->orderBy('tanggal', 'desc')->get();
        }
        return view('cetak/cetkeluar', compact('aksi', 'no'));
    }
}
