@extends('layouts.main')
@section('title', 'Employees')
@section('content')
<section class="section">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$title ?? ''}}</h4>
                        <div class="mt-4 mb-3">
                            <div align="right" class="mb-3">
                                <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle">
                                    <thead class="table-primary text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Email</th>
                                            <th>Divisi</th>
                                            <th>Periode</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($employees as $employee)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td class="text-center">
                                                @if ($employee->photo)
                                                    <img src="{{ asset('storage/' . $employee->photo) }}" alt="Employee Photo" class="img-fluid" style="width: 50px; height: 50px;">
                                                @else
                                                    <img src="{{ asset('images/default.png') }}" alt="Default Photo" class="img-fluid" style="width: 50px; height: 50px;">
                                                @endif
                                            </td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->nip }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ $employee->division }}</td>
                                            <td>{{ $employee->period }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
