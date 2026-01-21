@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Guru</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Guru</label>
            <input type="text" name="nama" class="form-control"
       value="{{ old('nama', $teacher->nama) }}">

        </div>

        <div class="mb-3">
            <label>Mata Pelajaran</label>
        <input type="text" name="mapel" class="form-control"
       value="{{ old('mapel', $teacher->mapel) }}">

        </div>

        <div class="mb-3">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control"
       value="{{ old('no_hp', $teacher->no_hp) }}">

        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
