@extends('layouts.main')
@section('title', 'Employee Dashboard')

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
                            <p>Selamat datang, {{ $user->name }}!</p>
                            <ul>
                                <li><strong>Email:</strong> {{ $user->email }}</li>
                                <li><strong>Role:</strong> {{ $user->role }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
