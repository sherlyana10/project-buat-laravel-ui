@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Murid</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
           <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control" value="{{ old('kelas') }}">

        </div>

        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan') }}">
        </div>

        <button class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
