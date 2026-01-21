@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <h4 class="fw-bold">Dashboard</h4>
        <p class="text-muted mb-0">Selamat datang, {{ Auth::user()->name }} 👋</p>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <!-- STAT CARD -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Total Data</h6>
                    <h3 class="fw-bold">0</h3>
                    <small class="text-muted">Belum ada data</small>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Aktivitas Hari Ini</h6>
                    <h3 class="fw-bold">0</h3>
                    <small class="text-muted">Belum ada aktivitas</small>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-muted">Status Akun</h6>
                    <h5 class="fw-bold text-success">Aktif</h5>
                    <small class="text-muted">Terakhir login: {{ now()->format('d M Y') }}</small>
                </div>
            </div>
        </div>
    </div>

    <!-- INFO PANEL -->
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header fw-semibold">
                    Informasi
                </div>
                <div class="card-body">
                    <p class="mb-2">✔ Kamu berhasil login ke sistem.</p>
                    <p class="mb-2">✔ Gunakan menu di atas untuk mengelola data.</p>
                    <p class="mb-0">✔ Pastikan data selalu diperbarui.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header fw-semibold">
                    Shortcut
                </div>
                <div class="card-body d-grid gap-2">

    @auth
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('teachers.create') }}" class="btn btn-outline-primary btn-sm">
                Tambah Data Guru
            </a>
            <a href="{{ route('teachers.index') }}" class="btn btn-outline-secondary btn-sm">
                Lihat Data Guru
            </a>
        @else
            <a href="{{ route('students.create') }}" class="btn btn-outline-primary btn-sm">
                Tambah Data Saya
            </a>
            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary btn-sm">
                Lihat Data Saya
            </a>
        @endif
    @endauth

</div>

            </div>
        </div>
    </div>
</div>
@endsection
