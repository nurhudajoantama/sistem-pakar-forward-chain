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
                    <div class="form-group">
                        <label for="penyakitInput">Masukkan Penyakit</label>
                        <select id="penyakitInput" class="form-control" name="penyakit[]" multiple="multiple" required>
                            <option value=""></option>
                            @foreach ($gejala->penyakit as $item)
                            <option value="{{ $item->kode_penyakit }}" selected>{{ $item->nama_penyakit }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ $title }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
    $('#penyakitInput').select2({
        ajax: {
            url: '{{ route('select2.penyakit') }}',
            dataType: 'json',
            delay: 250,
            processResults: function(data){
                return {
                    results: data.results.map((item) => {
                        return {
                            id: item.kode_penyakit,
                            text: item.text
                        }
                    })
                }
            },
            cache: true
        },
        placeholder: 'Masukkan Penyakit',
        allowClear: false
    })
})
</script>
@endpush