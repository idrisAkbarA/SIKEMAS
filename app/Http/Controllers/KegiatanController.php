<?php

namespace App\Http\Controllers;

use App\kegiatan;
use App\peserta;
use Illuminate\Support\Facades\DB;

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
    public function getIdKegiatanPeserta($nik,$idKegiatanBaru){
        $data = Peserta::find($nik);
        $idKegiatanDB = json_decode($data->id_kegiatan, true);
        if($idKegiatanDB == null){
            return "[$idKegiatanBaru]";
        }else{
            array_push($idKegiatanDB, $idKegiatanBaru);
            return$idKegiatanDB;
        }
    }
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
            //get all json from this peserta
            DB::table('pesertas')
                ->updateOrInsert(
                    ['nik' => $pesertaTemp[$i]['nik'],],
                    ['nama' => $pesertaTemp[$i]['nama'],
                    'jk' => $pesertaTemp[$i]['jk'],
                    'alamat' => $pesertaTemp[$i]['alamat'],
                    'pekerjaan' => $pesertaTemp[$i]['pekerjaan'],
                    'hp' => $pesertaTemp[$i]['hp'],
                    'ket' => "ket",]
                );
        }
        for ($i=0; $i <sizeof($pesertaTemp) ; $i++) { 
            $peserta = peserta::where('nik', $pesertaTemp[$i]['nik'])->first();
            $peserta->id_kegiatan = $this->getIdKegiatanPeserta($pesertaTemp[$i]['nik'], $kegiatan->id_kegiatan);
            $peserta->save();
        }
        return response('true');
        // return $nikOnly;
    } catch (\Throwable $th) {
        // throw $th;
        return response('false');
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
