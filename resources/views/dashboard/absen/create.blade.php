@extends('layouts.app')
@section('main')
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 my-3">
            <h2><a href="/dashboard/absen"><i class="ti ti-arrow-left"></i></a> Tambah Absensi</h2>
        </div>
    </div>
    <form action="/dashboard/absen" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Absensi</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="date" class="form-label">Tanggal Absensi</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        id="date" name="date" value="{{ date('Y-m-d') }}">
                                    @error('date')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                    <input type="hidden" name="rombel_id" value="{{ auth()->user()->rombel_id }}">
                                </div>
                            </div>
                        </div>
                        @foreach ($students as $student)
                            <input type="hidden" name="date_detail[]" value="{{ date('Y-m-d') }}">
                            <input type="hidden" value="{{ $student->id }}" name="student_id[]">
                            <input type="hidden" value="{{ auth()->user()->rombel_id }}" name="rombel_id[]">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <button type="submit" class="btn btn-primary" style="margin-right: 15px">Tambah Absensi <i
                        class="ti ti-plus"></i></button>
                <a href="/dashboard/absen" class="btn btn-outline-warning">Batal</a>
            </div>
        </div>
    </form>
    {{-- @dd(url()->full()) --}}
@endsection
