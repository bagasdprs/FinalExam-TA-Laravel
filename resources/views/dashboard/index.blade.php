@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
<table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th>
                <th>Penilaian</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $index => $employee)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->rating }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
