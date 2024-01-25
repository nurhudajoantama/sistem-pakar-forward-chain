@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="h3 mb-4 text-gray-800">Gejala</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('gejala.create') }}" class="btn btn-primary">Tambah Gejala</a>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
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

{{ $dataTable->scripts() }}
@endpush