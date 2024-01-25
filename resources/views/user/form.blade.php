@extends('layouts.main')

@php
$method = $user->exists ? 'PUT' : 'POST';
$action = $user->exists ? route('user.update', $user) : route('user.store');
$title = $user->exists ? 'Edit' : 'Tambah';
@endphp

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="h3 mb-4 text-gray-800">{{ $title }} User</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ $action }}" method="POST">
                    @csrf
                    @method($method)
                    <div class="form-group">
                        <label for="emailInput">Email</label>
                        <input type="email" class="form-control" id="emailInput" placeholder="Email" 
                        name="email" value="{{ old('email') ?? $user->email }}">
                    </div>
                    <div class="form-group">
                        <label for="nameInput">Name</label>
                        <input type="text" class="form-control" id="nameInput" placeholder="Name" 
                        name="name" value="{{ old('name') ?? $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="passwordInput">Password</label>
                        <input type="password" class="form-control" id="passwordInput" placeholder="Password" 
                        name="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmationInput">Password Confirmation</label>
                        <input type="password" class="form-control" id="password_confirmationInput" placeholder="Password Confirmation" 
                        name="password_confirmation">
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