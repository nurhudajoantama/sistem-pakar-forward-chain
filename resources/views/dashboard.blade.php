@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Penyakit
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ App\Models\Penyakit::count() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Gejala
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ App\Models\Gejala::count() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection