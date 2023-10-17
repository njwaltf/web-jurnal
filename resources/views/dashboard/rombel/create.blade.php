@extends('layouts.app')
@section('main')
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 my-3">
            <h2><a href="/dashboard/rombel"><i class="ti ti-arrow-left"></i></a> Tambah Rombel</h2>
        </div>
    </div>
    <form action="/dashboard/rombel" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Rombel</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="name" class="form-label">Nama Rombel</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <p class="invalid" style="color: red">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Jurusan</label>
                                    <select class="form-select @error('jurusan_id') is-invalid @enderror"
                                        aria-label="Default select example" id="jurusan_id" name="jurusan_id">
                                        <option value="" selected>Set Jurusan</option>
                                        @forelse ($jurusans as $mapel)
                                            <option value="{{ $mapel->id }}">{{ $mapel->name }}</option>
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
                <button type="submit" class="btn btn-primary" style="margin-right: 15px">Tambah Rombel <i
                        class="ti ti-plus"></i></button>
                <a href="/dashboard/rombel" class="btn btn-outline-warning">Batal</a>
            </div>
        </div>
    </form>
    {{-- @dd(url()->full()) --}}
@endsection
