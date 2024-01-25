@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div>
        <h1>Sistem Pakar</h1>
        <p>
            Sistem Pakar Diagnosa Penyakit
        </p>
    </div>

    <div>
        <a class="btn btn-primary btn-lg w-100" href="{{ route('diagnose.index') }}">Mulai</a>
    </div>
</div>
@endsection