@extends('layouts.base')

@section('halaman')
    Dashboard
@endsection

@section('dashboard')
    bilu
@endsection

@section('content')
<dashboard data="{{$kegiatan}}" user="{{$user}}"></dashboard>
@endsection

<style>
    .bilu {
        background-color: #ade8f5;
    }
</style>