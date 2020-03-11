<?php

namespace App\Http\Controllers;

use App\kegiatan;
use App\peserta;

use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard')->with('kegiatan',kegiatan::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        try {
            //code...
        $id_kel = "Air Hitam"; //*ganti isi variable kelak dengan session
        $input = $request;
        $kegiatan = new kegiatan;
        $kegiatan->nama_kel = $id_kel;
        $kegiatan->nama_kegiatan = $input->nama_kegiatan;
        $kegiatan->tanggal_dari = $input->tanggal_dari;
        $kegiatan->tanggal_sampai = $input->tanggal_sampai;
        $kegiatan->tujuan = $input->tujuan;
        $kegiatan->tempat_kegiatan = $input->tempat_kegiatan;
        $kegiatan->penyelenggara = $input->penyelenggara;
        $kegiatan->penanggung_jawab = $input->penanggung_jawab;
        $kegiatan->latar_belakang = $input->latar_belakang;
        $kegiatan->trainer = $input->trainer;
        $kegiatan->cp_trainer = $input->cp_trainer;
        $kegiatan->uang_saku = $input->uang_saku;
        $kegiatan->anggaran = $input->anggaran;
        $kegiatan->outcome = $input->outcome;
        $kegiatan->foto1 = $input->foto1;
        $kegiatan->foto2 = $input->foto2;
        $kegiatan->foto3 = $input->foto3;
        $kegiatan->foto4 = $input->foto4;
        $kegiatan->peserta = json_encode($input->peserta,true);
        $kegiatan->save();

        
        $pesertaTemp = $input->peserta;
        $nikOnly=[];
        for ($i=0; $i < sizeof($pesertaTemp) ; $i++) { 
            // array_push($nikOnly, $pesertaTemp[$i]['nik']);
            $peserta = new peserta;
            $peserta->nik = $pesertaTemp[$i]['nik'];
            $peserta->nama = $pesertaTemp[$i]['nama'];
            $peserta->jk = $pesertaTemp[$i]['jk'];
            $peserta->alamat = $pesertaTemp[$i]['alamat'];
            $peserta->pekerjaan = $pesertaTemp[$i]['pekerjaan'];
            $peserta->hp = $pesertaTemp[$i]['hp'];
            $peserta->id_kegiatan = "[]";
            $peserta->ket = "ket";
            $peserta->save();
        }
        return $nikOnly;
    } catch (\Throwable $th) {
        //throw $th
        throw $th;
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $kegiatan = kegiatan::find($id);
        return view('detail')->with('kegiatan', $kegiatan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kegiatan $kegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(kegiatan $kegiatan)
    {
        //
    }
}
