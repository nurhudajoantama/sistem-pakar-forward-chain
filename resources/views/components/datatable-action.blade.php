@php
    $editLink ??= '#';
    $deleteLink ??= '#';
@endphp

<a href="{{ $editLink }}" class="btn btn-primary">
    <i class="fas fa-pencil-alt"></i>
</a>
<form class="d-inline" action="{{ $deleteLink }}" method="post" onsubmit="return confirm('Apakah Serius Ingin Menghapus Data Ini?')">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">
        <i class="fas fa-trash"></i>
    </button>
</form>