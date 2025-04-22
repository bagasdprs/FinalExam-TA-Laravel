@extends('layouts.main')
@section('title', 'Detail Karyawan')
@section('content')
<div class="container py-4">
    <h3 class="mb-4">Detail Karyawan</h3>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $employee->name }}</h5>
            <p class="card-text"><strong>NIP:</strong> {{ $employee->nip }}</p>
            <p class="card-text"><strong>Divisi:</strong> {{ $employee->division }}</p>
            <p class="card-text"><strong>Periode:</strong> {{ $employee->period }}</p>
            <p class="card-text"><strong>Status:</strong>
                @if ($employee->status == 'completed')
                    <span class="badge bg-success">Done</span>
                @else
                    <span class="badge bg-warning">Not Yet</span>
                @endif
            </p>
            <p class="card-text"><strong>Tanggal Penilaian:</strong> {{ $employee->evaluation_date }}</p>
            <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
