@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Guru</h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('teachers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Guru</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
        </div>

        <div class="mb-3">
            <label>Mata Pelajaran</label>
            <input type="text" name="mapel" class="form-control" value="{{ old('mapel') }}">
        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}">

        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
