@extends('layouts.app')
@section('main')
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 my-3">
            <h2><a href="/dashboard/user"><i class="ti ti-arrow-left"></i></a> Edit user</h2>
        </div>
    </div>
    <form action="/dashboard/user/{{ $user->id }}" method="post">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data user</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="username" class="form-label">Nama Pengguna</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        id="username" name="username" value="{{ old('username', $user->username) }}">
                                    @error('username')
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
                                            <option value="{{ $rombel->id }}"
                                                @if ($user->rombel_id === $rombel->id) selected @endif>
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
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="title" class="form-label">Jurusan</label>
                                    <select class="form-select @error('jurusan_id') is-invalid @enderror"
                                        aria-label="Default select example" id="jurusan_id" name="jurusan_id">
                                        <option value="" selected>Set Jurusan</option>
                                        @forelse ($jurusans as $rombel)
                                            <option value="{{ $rombel->id }}"
                                                @if ($user->jurusan_id === $rombel->id) selected @endif>
                                                {{ $rombel->name }}</option>
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
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select @error('role') is-invalid @enderror"
                                        aria-label="Default select example" id="role" name="role">
                                        <option value="" selected>Set Role</option>
                                        <option value="{{ 'Admin' }}"
                                            @if ($user->role === 'Admin') selected @endif>Admin</option>
                                        <option value="{{ 'PJ' }}"
                                            @if ($user->role === 'PJ') selected @endif>PJ</option>
                                    </select>
                                    @error('role')
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
                <button type="submit" class="btn btn-warning" style="margin-right: 15px">Edit Data user <i
                        class="ti ti-pencil"></i></button>
                <a href="/dashboard/user" class="btn btn-outline-warning">Batal</a>
            </div>
        </div>
    </form>
    {{-- @dd(url()->full()) --}}
@endsection
