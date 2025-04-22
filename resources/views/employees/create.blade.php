@extends('layouts.main')
@section('title', 'Add Employees')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="container py-4">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <h3 class="card-title">Tambah Karyawan</h3>
                        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="number" class="form-control" id="nip" name="nip" value="{{ old('nip') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="col-form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="division" class="form-label">Divisi</label>
                                <input type="text" class="form-control" id="division" name="division" value="{{ old('division') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="period" class="form-label">Periode</label>
                                <input type="text" class="form-control" id="period" name="period" value="{{ old('period') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
