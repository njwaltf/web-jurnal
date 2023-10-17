@extends('layouts.app')
@section('main')
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 my-3">
            <h2><a href="/dashboard/mapel"><i class="ti ti-arrow-left"></i></a> Edit Mapel</h2>
        </div>
    </div>
    <form action="/dashboard/mapel/{{ $mapel->id }}" method="post">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Mapel</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="mapel_name" class="form-label">Nama Mata Pelajaran</label>
                                    <input type="text" class="form-control @error('mapel_name') is-invalid @enderror"
                                        id="mapel_name" name="mapel_name"
                                        value="{{ old('mapel_name', $mapel->mapel_name) }}">
                                    @error('mapel_name')
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
                                        <option value="" selected>Set Mapel</option>
                                        @forelse ($jurusans as $jurusan)
                                            <option value="{{ $jurusan->id }}"
                                                @if ($mapel->jurusan_id === $jurusan->id) selected @endif>
                                                {{ $jurusan->name }}</option>
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
                <button type="submit" class="btn btn-warning" style="margin-right: 15px">Edit Data Mapel <i
                        class="ti ti-pencil"></i></button>
                <a href="/dashboard/mapel" class="btn btn-outline-warning">Batal</a>
            </div>
        </div>
    </form>
    {{-- @dd(url()->full()) --}}
@endsection
