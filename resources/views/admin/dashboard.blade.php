@extends('layouts.main')
@section('title', 'Admin Dashboard')

@section('content')
    <section class="section">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ $title ?? '' }}
                            </h4>
                            <h3>Admin Dashboard</h3>
                            <p>Selamat datang, Admin!</p>
                            <a href="{{ route('employees.index') }}" class="btn btn-primary">Kelola Karyawan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
