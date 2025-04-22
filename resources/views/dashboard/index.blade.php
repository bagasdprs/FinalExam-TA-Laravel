@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
<div class="container py-4">
    <h3 class="mb-4">Dashboard Penilaian Kinerja Karyawan</h3>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Karyawan</th>
                    <th>NIP</th>
                    <th>Email</th>
                    <th>Divisi</th>
                    <th>Periode</th>
                    <th>Status</th>
                    <th>Tanggal Penilaian</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ( $employees as $index => $employee )
                <tr>
                    <td class="text-center">{{ $no++ }}</td>
                    <td class="text-center">
                        @if ($employee->photo)
                            <img src="{{ asset('storage/' . $employee->photo) }}" alt="Employee Photo" class="img-fluid" style="width: 50px; height: 50px;">
                        @else
                            <img src="{{ asset('images/default.png') }}" alt="Default Photo" class="img-fluid" style="width: 50px; height: 50px;">
                        @endif
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->nip }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->division }}</td>
                    <td>{{ $employee->period }}</td>
                    <td class="text-center">
                        @if ($employee->status == 'completed')
                            <span class="badge bg-success">Done</span>
                        @else
                            <span class="badge bg-warning">Not Yet</span>
                        @endif
                    </td>
                    <td class="text-center">{{ $employee->evaluation_date }}</td>
                    <td class="text-center">
                        <a href="{{ route('dashboard.show', $employee->id) }}" class="btn btn-primary btn-sm">Detail</a>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
