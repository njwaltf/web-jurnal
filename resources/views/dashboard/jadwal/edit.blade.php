@extends('layouts.app')
@section('main')
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 my-3">
            <h2><a href="/dashboard/jadwal"><i class="ti ti-arrow-left"></i></a>Edit Jadwal</h2>
        </div>
    </div>
    <form action="/dashboard/jadwal/{{ $jadwal->id }}" method="post">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Jadwal</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Nama Guru</label>
                                    <select class="form-select @error('teacher_id') is-invalid @enderror"
                                        aria-label="Default select example" id="teacher_id" name="teacher_id">
                                        <option value="" selected>Set nama guru</option>
                                        @forelse ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}"
                                                @if ($jadwal->teacher_id === $teacher->id) selected @endif>{{ $teacher->name }}
                                            </option>
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
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Rombel</label>
                                    <select class="form-select @error('rombel_id') is-invalid @enderror"
                                        aria-label="Default select example" id="rombel_id" name="rombel_id">
                                        <option value="" selected>Set rombel</option>
                                        @forelse ($rombels as $rombel)
                                            <option value="{{ $rombel->id }}"
                                                @if ($jadwal->rombel_id === $rombel->id) selected @endif>
                                                {{ $rombel->name }}</option>
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
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Hari</label>
                                    <select class="form-select @error('day') is-invalid @enderror"
                                        aria-label="Default select example" id="day" name="day">
                                        <option value="" selected>Set Hari</option>
                                        <option value="{{ 'Senin' }}"
                                            @if ($jadwal->day === 'Senin') selected @endif>Senin</option>
                                        <option value="{{ 'Selasa' }}"
                                            @if ($jadwal->day === 'Selasa') selected @endif>Selasa</option>
                                        <option value="{{ 'Rabu' }}"
                                            @if ($jadwal->day === 'Rabu') selected @endif>Rabu</option>
                                        <option value="{{ 'Kamis' }}"
                                            @if ($jadwal->day === 'Kamis') selected @endif>Kamis</option>
                                        <option value="{{ 'Jumat' }}"
                                            @if ($jadwal->day === 'Jumat') selected @endif>Jum'at</option>
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
                                        <option value="{{ 1 }}"
                                            @if ($jadwal->start === 1) selected @endif>Jam ke-1</option>
                                        <option value="{{ 2 }}"
                                            @if ($jadwal->start === 2) selected @endif>Jam ke-2</option>
                                        <option value="{{ 3 }}"
                                            @if ($jadwal->start === 3) selected @endif>Jam ke-3</option>
                                        <option value="{{ 4 }}"
                                            @if ($jadwal->start === 4) selected @endif>Jam ke-4</option>
                                        <option value="{{ 5 }}"
                                            @if ($jadwal->start === 5) selected @endif>Jam ke-5</option>
                                        <option value="{{ 6 }}"
                                            @if ($jadwal->start === 6) selected @endif>Jam ke-6</option>
                                        <option value="{{ 7 }}"
                                            @if ($jadwal->start === 7) selected @endif>Jam ke-7</option>
                                        <option value="{{ 8 }}"
                                            @if ($jadwal->start === 8) selected @endif>Jam ke-8</option>
                                        <option value="{{ 9 }}"
                                            @if ($jadwal->start === 9) selected @endif>Jam ke-9</option>
                                        <option value="{{ 10 }}"
                                            @if ($jadwal->start === 10) selected @endif>Jam ke-10</option>
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
                                        <option value="{{ 1 }}"
                                            @if ($jadwal->finish === 1) selected @endif>Jam ke-1</option>
                                        <option value="{{ 2 }}"
                                            @if ($jadwal->finish === 2) selected @endif>Jam ke-2</option>
                                        <option value="{{ 3 }}"
                                            @if ($jadwal->finish === 3) selected @endif>Jam ke-3</option>
                                        <option value="{{ 4 }}"
                                            @if ($jadwal->finish === 4) selected @endif>Jam ke-4</option>
                                        <option value="{{ 5 }}"
                                            @if ($jadwal->finish === 5) selected @endif>Jam ke-5</option>
                                        <option value="{{ 6 }}"
                                            @if ($jadwal->finish === 6) selected @endif>Jam ke-6</option>
                                        <option value="{{ 7 }}"
                                            @if ($jadwal->finish === 7) selected @endif>Jam ke-7</option>
                                        <option value="{{ 8 }}"
                                            @if ($jadwal->finish === 8) selected @endif>Jam ke-8</option>
                                        <option value="{{ 9 }}"
                                            @if ($jadwal->finish === 9) selected @endif>Jam ke-9</option>
                                        <option value="{{ 10 }}"
                                            @if ($jadwal->finish === 10) selected @endif>Jam ke-10</option>
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
                <button type="submit" class="btn btn-warning" style="margin-right: 15px">Edit Data Jadwal <i
                        class="ti ti-pencil"></i></button>
                <a href="/dashboard/jadwal" class="btn btn-outline-warning">Batal</a>
            </div>
        </div>
    </form>
    {{-- @dd(url()->full()) --}}
@endsection
