@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Data Murid</h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- NAMA -->
        <div class="mb-3">
            <label>Nama Murid</label>
            <input type="text" name="nama" class="form-control"
       value="{{ old('nama', $student->nama) }}">

        </div>

        <!-- KELAS -->
        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control"
       value="{{ old('kelas', $student->kelas) }}">

        </div>

        <!-- JURUSAN -->
        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan" class="form-control"
       value="{{ old('jurusan', $student->jurusan) }}">

        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
