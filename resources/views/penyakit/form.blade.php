@extends('layouts.dashboard')

@php
$method = $penyakit->exists ? 'PUT' : 'POST';
$action = $penyakit->exists ? route('penyakit.update', $penyakit) : route('penyakit.store');
$title = $penyakit->exists ? 'Edit' : 'Tambah';
@endphp

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="h3 mb-4 text-gray-800">{{ $title }} Penyakit</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ $action }}" method="POST">
                    @csrf
                    @method($method)
                    <div class="form-group">
                        <label for="kodepenyakitInput">Kode Penyakit</label>
                        <input type="text" class="form-control" id="kodepenyakitInput" placeholder="Kode penyakit" 
                        name="kode_penyakit" value="{{ old('kode_penyakit') ?? $penyakit->kode_penyakit }}">
                    </div>
                    <div class="form-group">
                        <label for="namapenyakitInput">Nama Penyakit</label>
                        <input type="text" class="form-control" id="namapenyakitInput" placeholder="Nama penyakit"
                        name="nama_penyakit" value="{{ old('nama_penyakit') ?? $penyakit->nama_penyakit }}">
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