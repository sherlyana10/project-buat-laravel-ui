@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Guru</h3>


    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <a href="{{ route('teachers.create') }}" class="btn btn-primary mb-3">
        Tambah Guru
    </a>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Mata Pelajaran</th>
            <th>No HP</th>
            <th>Aksi</th>
        </tr>

        @foreach($teachers as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->mapel }}</td>
            <td>{{ $item->no_hp }}</td>
            <td>
                <a href="{{ route('teachers.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('teachers.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
