@extends('layouts.main')
@section('title', 'Tambah Nilai Karyawan')

@section('content')
<section class="section">
    <div class="container py-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title mb-4">
                            {{ $title ?? '' }}
                        </h3>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
