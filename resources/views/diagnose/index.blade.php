@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Diagnose</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('diagnose.calculate') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="gejalaInput">Masukkan Gejala</label>
                    <select id="gejalaInput" class="form-control" name="gejala[]" multiple="multiple" required>
                        <option value=""></option>
                    </select>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary">Diagnose</button>
                </div>
            </form>
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