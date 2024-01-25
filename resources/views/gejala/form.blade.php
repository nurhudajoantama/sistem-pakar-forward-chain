@extends('layouts.dashboard')

@php
$method = $gejala->exists ? 'PUT' : 'POST';
$action = $gejala->exists ? route('gejala.update', $gejala) : route('gejala.store');
$title = $gejala->exists ? 'Edit' : 'Tambah';
@endphp

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="h3 mb-4 text-gray-800">{{ $title }} Gejala</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ $action }}" method="POST">
                    @csrf
                    @method($method)
                    <div class="form-group">
                        <label for="kodeGejalaInput">Kode Gejala</label>
                        <input type="text" class="form-control" id="kodeGejalaInput" placeholder="Kode Gejala" 
                        name="kode_gejala" value="{{ old('kode_gejala') ?? $gejala->kode_gejala }}">
                    </div>
                    <div class="form-group">
                        <label for="namaGejalaInput">Nama Gejala</label>
                        <input type="text" class="form-control" id="namaGejalaInput" placeholder="Nama Gejala"
                        name="nama_gejala" value="{{ old('nama_gejala') ?? $gejala->nama_gejala }}">
                    </div>
                    <button type="submit" class="btn btn-primary">{{ $title }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
@endpush