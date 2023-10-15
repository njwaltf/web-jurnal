@extends('layouts.app')
@section('main')
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 my-3">
            <h2><a href="/dashboard/jurnal"><i class="ti ti-arrow-left"></i></a> Tambah Guru</h2>
        </div>
    </div>
    <form action="/dashboard/jurnal" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Guru</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="date" class="form-label">Tanggal Jurnal</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        id="date" name="date" value="{{ old('date') }}">
                                    @error('date')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="teacher_id" class="form-label">Nama Guru</label>
                                    <select class="form-select @error('teacher_id') is-invalid @enderror"
                                        aria-label="Default select example" id="teacher_id" name="teacher_id">
                                        <option value="" selected>Set nama guru</option>
                                        @forelse ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
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
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="mapel_id" class="form-label">Mata Pelajaran</label>
                                    <select class="form-select @error('mapel_id') is-invalid @enderror"
                                        aria-label="Default select example" id="mapel_id" name="mapel_id">
                                        <option value="" selected>Set pelajaran</option>
                                        @forelse ($mapels as $mapel)
                                            <option value="{{ $mapel->id }}">{{ $mapel->name }}</option>
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
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="kd" class="form-label">KD/CP</label>
                                    <input type="text" name="kd"
                                        class="form-control @error('kd') is-invalid @enderror" value="{{ old('kd') }}"
                                        id="kd">
                                    @error('kd')
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
                                    <label for="material" class="form-label">Materi</label>
                                    <textarea type="text" name="material" id="material" cols="160" rows="5"
                                        class="form-control @error('material') is-invalid @enderror" value="{{ old('material') }}"></textarea>
                                    @error('material')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="task" class="form-label">Tugas</label>
                                    <textarea type="text" name="task" id="" cols="160" rows="5"
                                        class="form-control @error('task') is-invalid @enderror" value="{{ old('task') }}"></textarea>
                                    @error('task')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-4">
                                    <label for="sakit" class="form-label">Jumlah Sakit</label>
                                    <input type="number" name="sakit"
                                        class="form-control @error('sakit') is-invalid @enderror"
                                        value="{{ old('sakit') }}" id="sakit">
                                    @error('sakit')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-4">
                                    <label for="izin" class="form-label">Jumlah Izin</label>
                                    <input type="number" name="izin"
                                        class="form-control @error('izin') is-invalid @enderror"
                                        value="{{ old('izin') }}" id="izin">
                                    @error('izin')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-4">
                                    <label for="alpha" class="form-label">Jumlah Alpha</label>
                                    <input type="number" name="alpha"
                                        class="form-control @error('alpha') is-invalid @enderror"
                                        value="{{ old('alpha') }}" id="alpha">
                                    @error('alpha')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-4">
                                    <label for="hadir" class="form-label">Jumlah Hadir</label>
                                    <input type="number" name="hadir"
                                        class="form-control @error('hadir') is-invalid @enderror"
                                        value="{{ old('hadir') }}" id="hadir">
                                    @error('hadir')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="detail" class="form-label">Keterangan</label>
                                    <textarea type="text" name="detail" id="detail" cols="160" rows="5"
                                        class="form-control @error('detail') is-invalid @enderror" value="{{ old('detail') }}"></textarea>
                                    @error('detail')
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
        {{-- hidden --}}
        <input type="hidden" name="rombel_id" value="{{ auth()->user()->rombel_id }}">
        <div class="row">
            <div class="col-lg-3">
                <button type="submit" class="btn btn-primary" style="margin-right: 15px">Tambah Jurnal <i
                        class="ti ti-plus"></i></button>
                <a href="/dashboard/teacher" class="btn btn-outline-warning">Batal</a>
            </div>
        </div>
    </form>
    {{-- @dd(url()->full()) --}}
@endsection
