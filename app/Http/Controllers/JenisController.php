<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Models\Barang;
use Illuminate\Http\Request;

class JenisController extends Controller
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
        $jenis = Jenis::all();
        $no = 0;
        return view('jenis/datajenis', compact('jenis', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenis = Jenis::where('jenis', $request->nm_jenis)->get();
        $cek = count($jenis);
        if ($cek > 0) {
            return redirect()->route('jenis.index')->with('msgx', 'Data Jenis '.$request->nm_jenis.' Sudah ada! Tidak dapat Ditambahkan');
        }

        Jenis::create([
            'jenis' => $request->nm_jenis
        ]);
        return redirect()->route('jenis.index')->with('msg', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function show(Jenis $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis = Jenis::find($id);
        return view('jenis/edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd('sad');
        Jenis::find($id)->update([
            'jenis' => $request->nm_jenis
        ]);
        return redirect()->route('jenis.index')->with('msg', 'Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jenis  $jenis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($jenis->find($id));
        Jenis::destroy($id);
        return redirect()->route('jenis.index');
    }
}
