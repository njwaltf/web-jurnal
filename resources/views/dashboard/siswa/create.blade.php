@extends('layouts.app')
@section('main')
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 my-3">
            <h2><a href="/dashboard/student"><i class="ti ti-arrow-left"></i></a> Tambah Murid</h2>
        </div>
    </div>
    <form action="/dashboard/student" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Murid</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="full_name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('full_name') is-invalid @enderror"
                                        id="full_name" name="full_name" value="{{ old('full_name') }}">
                                    @error('full_name')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="nis" class="form-label">NISN</label>
                                    <input type="text" class="form-control @error('nis') is-invalid @enderror"
                                        id="nis" name="nis" value="{{ old('nis') }}">
                                    @error('nis')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                                    <input type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror"
                                        id="tahun_ajaran" name="tahun_ajaran" value="{{ old('tahun_ajaran') }}">
                                    @error('tahun_ajaran')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="rombel_id" class="form-label">Kelas</label>
                                    <select class="form-select @error('rombel_id') is-invalid @enderror"
                                        aria-label="Default select example" id="rombel_id" name="rombel_id">
                                        <option value="" selected>Set Kelas</option>
                                        @forelse ($rombels as $rombel)
                                            <option value="{{ $rombel->id }}">{{ $rombel->name }}</option>
                                        @empty
                                            <option value="">Belum diset</option>
                                        @endforelse
                                    </select>
                                    @error('rombel_id')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="jurusan_id" class="form-label">Jurusan</label>
                                    <select class="form-select @error('jurusan_id') is-invalid @enderror"
                                        aria-label="Default select example" id="jurusan_id" name="jurusan_id">
                                        <option value="" selected>Set Jurusan</option>
                                        @forelse ($jurusans as $rombel)
                                            <option value="{{ $rombel->id }}">{{ $rombel->name }}</option>
                                        @empty
                                            <option value="">Belum diset</option>
                                        @endforelse
                                    </select>
                                    @error('jurusan_id')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <button type="submit" class="btn btn-primary" style="margin-right: 15px">Tambah Murid <i
                        class="ti ti-plus"></i></button>
                <a href="/dashboard/student" class="btn btn-outline-warning">Batal</a>
            </div>
        </div>
    </form>
    {{-- @dd(url()->full()) --}}
@endsection
