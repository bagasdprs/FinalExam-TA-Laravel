@extends('layouts.main')
@section('title', 'Edit Karyawan')

@section('content')
    <section class="section">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="mb-4">{{ $title ?? '' }}</h3>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('employees.update', $employee->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $employee->name) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nip" class="form-label">NIP</label>
                                        <input type="number" class="form-control" id="nip" name="nip"
                                            value="{{ old('nip', $employee->nip) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email', $employee->email) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="division" class="form-label">Divisi</label>
                                        <input type="text" class="form-control" id="division" name="division"
                                            value="{{ old('division', $employee->division) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="period" class="form-label">Periode</label>
                                        <input type="text" class="form-control" id="period" name="period"
                                            value="{{ old('period', $employee->period) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" id="status" name="status" required>
                                            <option value="completed"
                                                {{ old('status', $employee->status) == 'completed' ? 'selected' : '' }}>
                                                Completed</option>
                                            <option value="pending"
                                                {{ old('status', $employee->status) == 'pending' ? 'selected' : '' }}>
                                                Pending</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="evaluation_date" class="form-label">Tanggal Penilaian</label>
                                        <input type="date" class="form-control" id="evaluation_date"
                                            name="evaluation_date"
                                            value="{{ old('evaluation_date', $employee->evaluation_date) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="photo" class="form-label">Foto</label>
                                        <input type="file" class="form-control" id="photo" name="photo"
                                            accept="image/*">
                                        @if ($employee->photo)
                                            <img src="{{ asset('storage/' . $employee->photo) }}" alt="Employee Photo"
                                                class="img-fluid mt-2" style="width: 100px; height: 100px;">
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
