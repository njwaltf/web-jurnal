@extends('layouts.app')
@section('main')
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 my-3">
            <h2><a href="/dashboard/jadwal"><i class="ti ti-arrow-left"></i></a> Tambah Jadwal</h2>
        </div>
    </div>
    <form action="/dashboard/jadwal" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Jadwal</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Nama Guru</label>
                                    <select class="form-select @error('teacher_id') is-invalid @enderror"
                                        aria-label="Default select example" id="teacher_id" name="teacher_id">
                                        <option value="" selected>Set nama guru</option>
                                        @forelse ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->teacher_name }}</option>
                                        @empty
                                            <option value="">Belum diset</option>
                                        @endforelse
                                    </select>
                                    @error('teacher_id')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
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
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Rombel</label>
                                    <select class="form-select @error('rombel_id') is-invalid @enderror"
                                        aria-label="Default select example" id="rombel_id" name="rombel_id">
                                        <option value="" selected>Set rombel</option>
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
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="mapel_id" class="form-label">Mata Pelajaran</label>
                                    <select class="form-select @error('mapel_id') is-invalid @enderror"
                                        aria-label="Default select example" id="mapel_id" name="mapel_id">
                                        <option value="" selected>Set Mata Pelajaran</option>
                                        @forelse ($mapels as $rombel)
                                            <option value="{{ $rombel->id }}">{{ $rombel->mapel_name }}</option>
                                        @empty
                                            <option value="">Belum diset</option>
                                        @endforelse
                                    </select>
                                    @error('mapel_id')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Hari</label>
                                    <select class="form-select @error('day') is-invalid @enderror"
                                        aria-label="Default select example" id="day" name="day">
                                        <option value="" selected>Set Hari</option>
                                        <option value="{{ 'Senin' }}">Senin</option>
                                        <option value="{{ 'Selasa' }}">Selasa</option>
                                        <option value="{{ 'Rabu' }}">Rabu</option>
                                        <option value="{{ 'Kamis' }}">Kamis</option>
                                        <option value="{{ 'Jumat' }}">Jum'at</option>
                                    </select>
                                    @error('day')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Mulai Jam ke</label>
                                    <select class="form-select @error('start') is-invalid @enderror"
                                        aria-label="Default select example" id="start" name="start">
                                        <option value="" selected>Set Jam pertama</option>
                                        <option value="{{ 1 }}">Jam ke-1</option>
                                        <option value="{{ 2 }}">Jam ke-2</option>
                                        <option value="{{ 3 }}">Jam ke-3</option>
                                        <option value="{{ 4 }}">Jam ke-4</option>
                                        <option value="{{ 5 }}">Jam ke-5</option>
                                        <option value="{{ 6 }}">Jam ke-6</option>
                                        <option value="{{ 7 }}">Jam ke-7</option>
                                        <option value="{{ 8 }}">Jam ke-8</option>
                                        <option value="{{ 9 }}">Jam ke-9</option>
                                        <option value="{{ 10 }}">Jam ke-10</option>
                                    </select>
                                    @error('start')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Selesai Jam ke</label>
                                    <select class="form-select @error('finish') is-invalid @enderror"
                                        aria-label="Default select example" id="finish" name="finish">
                                        <option value="" selected>Set Jam terakhir</option>
                                        <option value="{{ 1 }}">Jam ke-1</option>
                                        <option value="{{ 2 }}">Jam ke-2</option>
                                        <option value="{{ 3 }}">Jam ke-3</option>
                                        <option value="{{ 4 }}">Jam ke-4</option>
                                        <option value="{{ 5 }}">Jam ke-5</option>
                                        <option value="{{ 6 }}">Jam ke-6</option>
                                        <option value="{{ 7 }}">Jam ke-7</option>
                                        <option value="{{ 8 }}">Jam ke-8</option>
                                        <option value="{{ 9 }}">Jam ke-9</option>
                                        <option value="{{ 10 }}">Jam ke-10</option>
                                    </select>
                                    @error('finish')
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
                <button type="submit" class="btn btn-primary" style="margin-right: 15px">Tambah Jadwal <i
                        class="ti ti-plus"></i></button>
                <a href="/dashboard/jadwal" class="btn btn-outline-warning">Batal</a>
            </div>
        </div>
    </form>
    {{-- @dd(url()->full()) --}}
@endsection
