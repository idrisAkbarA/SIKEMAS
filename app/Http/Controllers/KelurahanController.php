<?php

namespace App\Http\Controllers;

use App\kelurahan;
use App\User;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return User::all();
        return view('akunPengguna')->with('akun', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambah(Request $request)
    {
        try {
            $input = $request;
            $password = "12345678";

            $pengguna = new kelurahan;
            $pengguna->nama_kel = $input->username;
            $pengguna->save();

            $pengguna = new User;
            $pengguna->username = $input->username;
            $pengguna->password = $password;
            $pengguna->save();
            
            return response('true');
        } catch (\Throwable $th) {
            // throw $th;
            return response('false');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function show(kelurahan $kelurahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $username)
    {
        try {
            $pengguna = User::find($username['username']);
            if ($pengguna != null) {
                return response('false');
            } else {
                $pengguna = kelurahan::find($username['old_un']);
                $pengguna->nama_kel = $username['username'];
                $pengguna->save();

                $pengguna = User::find($username['old_un']);
                $pengguna->username = $username['username'];
                $pengguna->save();

                return response('true');
            }
            return true;
        } catch (\Throwable $th) {
            // throw $th;
            return response('false');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function reset($username)
    {
        try {
            $password = "12345678";
            $pengguna = User::find($username);
            $pengguna->password = $password;
            $pengguna->save();

            return response('true');
        } catch (\Throwable $th) {
            throw $th;
        }
        return $username;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kelurahan  $kelurahan
     * @return \Illuminate\Http\Response
     */
    public function hapus($username)
    {
        try {
            $pengguna = User::find($username);
            $pengguna->delete();

            $pengguna = kelurahan::find($username);
            $pengguna->delete();
            return response('true');
        } catch (\Throwable $th) {
            // throw $th;
            return response('false');
        }
        // return $username;
    }

    public function cekSandi(Request $cek)
    {
        // $user = Auth::User()->username;
        $user = "Air Hitam";

        try {
            $sandi = User::find($user);

            if ($cek['sandi'] == $sandi->password) {
                return response('ada');
            } else {
                return response('takada');
            }
            
        } catch (\Throwable $th) {
            throw $th;
        }

        // return $request;
    }
    public function ubahSandi(Request $request)
    {
        // $user = Auth::User()->username;
        $user = "Air Hitam";

        try {
            $sandiBaru = User::find($user);
            $sandiBaru->password = $request['sandiBaru'];
            $sandiBaru->save();

            return response('true');
        } catch (\Throwable $th) {
            //throw $th;
            return response('false');
        }
    }
}
