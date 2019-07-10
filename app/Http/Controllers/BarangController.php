<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Jenis;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $barang = Barang::orderBy('jenis_id', 'asc')->get();
        $no = 0;
        return view('barang/databarang', compact('barang', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = Jenis::all();
        return view('barang/tambah', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = Barang::where(['nama_barang' => $request->nm_barang, 'jenis_id' => $request->id_jenis])->get();
        $cek = count($barang);
        if ($cek > 0) {
            $jenis = Jenis::find($request->id_jenis);
            return redirect()->route('barang.index')->with('msgx', 'Data Barang '.$request->nm_jenis.'di Jenis '. $jenis->jenis .' Sudah ada! Tidak dapat Ditambahkan');
        }

        //dd($request->nm_barang);
        Barang::create([
            'jenis_id' => $request->id_jenis,
            'nama_barang' => $request->nm_barang,
            'stok' => 0
        ]);
        return redirect()->route('barang.index')->with('msg', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis = Jenis::all();
        $barang = Barang::find($id);
        //dd($barang);
        return view('barang/edit', compact('jenis', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Barang::find($id)->update([
            'nama_barang' => $request->nm_barang,
            'jenis_id' => $request->id_jenis
        ]);
        // $barang = Barang::find($id);
        // $barang->nama_barang = $request->nm_barang;
        // $barang->jenis_id = $request->id_jenis;
        // $barang->save();
        return redirect()->route('barang.index')->with('msg', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect()->route('barang.index')->with('msg', 'Data Telah Di Hapus');
    }
}
