@extends('layouts.main')
@section('title', 'Daftar User')

@section('content')
<section class="section">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            {{ $title ?? '' }}
                        </h3>
                        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add User</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no =1;
                                @endphp
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-warning"><i class="bi bi-trash"></i></button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
