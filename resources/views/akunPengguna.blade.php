@extends('layouts.base')

@section('halaman')
    Akun Pengguna
@endsection

@section('pengguna')
    bilu
@endsection

@section('content')
<akunpengguna data="{{$akun}}"></akunpengguna>
@endsection

<style>
    .bilu {
        background-color: #ade8f5;
    }
</style>