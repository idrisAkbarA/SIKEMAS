<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\kelurahan;
use App\User;
use App\peserta;
use App\kegiatan;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
class initDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'initDB';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize user and kelurahan';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->call("migrate:fresh");
        $listKelurahan=[
            'Air Hitam',
            'Bandar Raya',
            'Labuh Baru Barat',
            'Labuh Baru Timur',
            'Sungai Sibam',
            'Tampan',
            'Tirtasiak',
        ];

        for ($i=0; $i < sizeof($listKelurahan); $i++) { 
            $kelurahan = new kelurahan;
            $kelurahan->nama_kel = $listKelurahan[$i];
            $kelurahan->save();

            $kelurahan = new User;
            $kelurahan->username = $listKelurahan[$i];
            $kelurahan->password = Hash::make("12345678");
            $kelurahan->save();
            echo $listKelurahan[$i]."\n";
        }
        $jk = ['Laki-laki', 'Perempuan'];
        for ($i=0; $i < 20; $i++) {
            $faker = Faker::create('id_ID'); 
            $peserta = new peserta;
            $peserta->nik = $faker->numerify('################');
            $peserta->nama = $faker->name;
            $peserta->jk = $jk[rand(0,1)];
            $peserta->alamat = $faker->address;
            $peserta->hp = $faker->phoneNumber;
            $peserta->pekerjaan = $faker->jobTitle;
            $peserta->id_kegiatan = "{}";
            $peserta->save();


        }
        echo "peserta created \n\n";

        $peserta = peserta::select('nik','nama','jk','alamat','hp','pekerjaan')->get()->toArray();
        $finalPeserta = [];
        for ($i=0; $i < sizeof($peserta) ; $i++) { 
            $temp = array_merge($peserta[$i], ['ket'=>'-']); //gabungkan isi array peserta ke $i dengan key keterangan
            array_push($finalPeserta, $temp); // masukkan peserta yang sudah ditambah keterangan ke dalam satu array
        }
        // $decodedPeserta = json_decode($peserta,true);
        $kumpulanPeserta = [];
        
        for ($i=0; $i < 50; $i++) { 
            $faker = Faker::create('id_ID');
            $kegiatan = new kegiatan;
            $kegiatan->nama_kel = $listKelurahan[rand(0,6)];
            $kegiatan->nama_kegiatan = $faker->company;
            $kegiatan->tanggal_dari = $faker->dateTime('now');
            $kegiatan->tanggal_sampai = $faker->dateTime('now');
            $kegiatan->tempat_kegiatan = $faker->streetName;
            $kegiatan->tujuan = $faker->sentence;
            $kegiatan->penyelenggara = $faker->name;
            $kegiatan->penanggung_jawab = $faker->name;
            $kegiatan->latar_belakang = $faker->sentence;
            $kegiatan->trainer = $faker->name;
            $kegiatan->cp_trainer = $faker->phoneNumber;
            $kegiatan->uang_saku = $faker->numerify('#####');
            $kegiatan->anggaran = $faker->numerify('#######');
            $kegiatan->outcome = $faker->sentence;
            $kegiatan->foto1 = "-";
            $kegiatan->foto2 = "-";
            $kegiatan->foto3 = "-";
            $kegiatan->foto4 = "-";

            for ($j=0; $j < rand(5,10) ; $j++) { 
                array_push($kumpulanPeserta,$finalPeserta[rand(0,19)]);
            }

            // $kegiatan->peserta = "[]";
            $kegiatan->peserta = json_encode($kumpulanPeserta,true);
            $kegiatan->save();
            $kumpulanPeserta =[];
        }
    }
}
