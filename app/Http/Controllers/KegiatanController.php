<?php

namespace App\Http\Controllers;

use App\kegiatan;
use App\peserta;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    
    public function index()
    {
        // $user = Auth::User()->username;
        $user = "Air Hitam";
        $kegiatan = kegiatan::where('nama_kel', $user)->get();
        return view('dashboard')->with('kegiatan', $kegiatan)->with('user', $user);
    }
 
    public function edit(request $request)
    {
        //
    }

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
        // $user = Auth::Use r()->username;
        $id_kel = "Air Hitam"; //*ganti isi variable kelak dengan session


        //*masukkan key keterangan di setiap peserta
        $input = $request;
        $finalPeserta = [];
        $pesertaArray = $input->peserta;
        for ($i=0; $i < sizeof($pesertaArray) ; $i++) { 
            $temp = array_merge($pesertaArray[$i], ['ket'=>'-']); //gabungkan isi array peserta ke $i dengan key keterangan
            array_push($finalPeserta, $temp); // masukkan peserta yang sudah ditambah keterangan ke dalam satu array

        }


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
        $kegiatan->peserta = json_encode($finalPeserta,true);
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
                    'hp' => $pesertaTemp[$i]['hp'],
                    'pekerjaan' => $pesertaTemp[$i]['pekerjaan'],
                    ]
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
        throw $th;
        // return response('false');
    }
    }

    public function detail($id)
    {
        $kegiatan = kegiatan::find($id);
        return view('detail')->with('kegiatan', $kegiatan);
    }

    public function update(Request $request, kegiatan $kegiatan)
    {
        //
    }

    public function destroy(kegiatan $kegiatan)
    {
        //
    }

    public function admin()
    {   
        $current_year  = Carbon::now()->year;
        $all_kegiatan  = kegiatan::whereYear('created_at',$current_year)->get();
        $all_kelurahan =  User::pluck('username');
        $grouped_kelurahan_data=[];
        for ($i=0; $i <sizeof($all_kelurahan) ; $i++) { 
            $kelurahan_data = kegiatan::where('nama_kel',$all_kelurahan[$i])->get();
            array_push($grouped_kelurahan_data, ["$all_kelurahan[$i]"=>$kelurahan_data]);
        }
        // array_push($grouped_kelurahan_data,kegiatan::where('nama_kel',$all_kelurahan[1])->get());
        // array_push($grouped_kelurahan_data,kegiatan::where('nama_kel',$all_kelurahan[0])->get());
        
        // $array= [1];
        // array_push($array,3);
        // return $grouped_kelurahan_data;
        // return $grouped_kelurahan_data;  
        // return [kegiatan::where('nama_kel',$all_kelurahan[1])->get()];
        // return [$grouped_kelurahan_data,$all_kelurahan];
        return view('dashboardAdmin')->with('kegiatan',json_encode($grouped_kelurahan_data));
    }
    public function searchAsAdmin(Request $request)
    {   
        $search = $request->search;
        $current_year  = Carbon::now()->year;
        $all_kegiatan  = kegiatan::whereYear('created_at',$current_year)->get();
        $all_kelurahan =  User::pluck('username');
        $grouped_kelurahan_data=[];
        for ($i=0; $i <sizeof($all_kelurahan) ; $i++) { 
            $kelurahan_data = kegiatan::where('nama_kel',$all_kelurahan[$i])
                                        ->where('nama_kegiatan', 'like','%'.$search.'%')
                                        ->get();
            array_push($grouped_kelurahan_data, ["$all_kelurahan[$i]"=>$kelurahan_data]);
        }
        // array_push($grouped_kelurahan_data,kegiatan::where('nama_kel',$all_kelurahan[1])->get());
        // array_push($grouped_kelurahan_data,kegiatan::where('nama_kel',$all_kelurahan[0])->get());
        
        // $array= [1];
        // array_push($array,3);
        // return $grouped_kelurahan_data;
        // return $grouped_kelurahan_data;  
        // return [kegiatan::where('nama_kel',$all_kelurahan[1])->get()];
        // return [$grouped_kelurahan_data,$all_kelurahan];
        
        return json_encode($grouped_kelurahan_data);
    }
}
