@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Hasil</h4>
            <p>Kemungkinan Penyakit</p>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        @foreach ($penyakit as $item)
                        <li>{{ $item['penyakit']->nama_penyakit }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('diagnose.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection