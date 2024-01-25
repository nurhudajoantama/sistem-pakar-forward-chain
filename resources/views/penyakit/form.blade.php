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
                    <div class="form-group">
                        <label for="gejalaInput">Masukkan Gejala</label>
                        <select id="gejalaInput" class="form-control" name="gejala[]" multiple="multiple" required>
                            <option value=""></option>
                            @foreach ($penyakit->gejala as $item)
                            <option value="{{ $item->kode_gejala }}" selected>{{ $item->nama_gejala }}</option>
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
    $('#gejalaInput').select2({
        ajax: {
            url: '{{ route('select2.gejala') }}',
            dataType: 'json',
            delay: 250,
            processResults: function(data){
                return {
                    results: data.results.map((item) => {
                        return {
                            id: item.kode_gejala,
                            text: item.text
                        }
                    })
                }
            },
            cache: true
        },
        placeholder: 'Masukkan Gejala',
        allowClear: false
    })
})
</script>
@endpush