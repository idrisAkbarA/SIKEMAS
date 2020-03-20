@extends('layouts.base')

@section('halaman')
    Dashboard Admin
@endsection

@section('dashboardadmin')
    bilu
@endsection

@section('content')
<dashboardadmin data="{{$kegiatan}}"></dashboardadmin>
@endsection

<style>
    .bilu {
        background-color: #ade8f5;
    }
</style>