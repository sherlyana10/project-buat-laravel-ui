@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Murid</h3>

    <a href="{{ route('students.create') }}" class="btn btn-primary mb-3">
        Tambah Murid
    </a>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>

        @foreach($students as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->kelas }}</td>
            <td>{{ $item->jurusan }}</td>
            <td>
                <a href="{{ route('students.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('students.destroy', $item->id) }}" method="POST" class="d-inline">
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
