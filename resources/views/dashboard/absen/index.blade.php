@extends('layouts.app')
@section('main')
    <h1>
        Daftar Absensi</h1>
    @if (auth()->user()->role === 'PJ')
        <div class="row">
            <div class="col-md-2">
                {{-- btn add --}}
                <a class="btn btn-info my-3" href="/dashboard/absen/create">Tambah Absensi<i class="ti ti-plus"></i></a>
            </div>
            <div class="col-md-2">
                {{-- btn add --}}
                {{-- <a class="btn btn-info my-3" href="{{ url('/absen/export') }}">Export Data PDF <i
                        class="ti ti-file-text"></i></a> --}}
            </div>
        </div>
    @endif

    <!--  Row 1 -->
    <div class="row">
        {{-- <h1>{{ auth()->user()->rombel_id }}</h1> --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!! session('success') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('successEdit'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {!! session('successEdit') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session()->has('successDelete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {!! session('successDelete') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Daftar Absen</h5>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle table-hover display" id="myTable">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">No</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Tanggal Absen</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Hadir</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Izin</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Sakit</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Alpha</h6>
                                        </th>
                                        @if (auth()->user()->role === 'PJ')
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Action</h6>
                                            </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($absens as $absen)
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">{{ $absen->date }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">
                                                    @if ($absen->hadir > 0)
                                                        {{ $absen->hadir }}
                                                    @else
                                                        Tidak ada
                                                    @endif
                                                </h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">
                                                    @if ($absen->izin > 0)
                                                        {{ $absen->izin }}
                                                    @else
                                                        Tidak ada
                                                    @endif
                                                </h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">
                                                    @if ($absen->sakit > 0)
                                                        {{ $absen->sakit }}
                                                    @else
                                                        Tidak ada
                                                    @endif
                                                </h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">
                                                    @if ($absen->alpha > 0)
                                                        {{ $absen->alpha }}
                                                    @else
                                                        Tidak ada
                                                    @endif
                                                </h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <form action="/dashboard/absen/{{ $absen->id }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger m-1" type="submit"
                                                        onclick="return confirm('Apakah kamu yakin ingin menghapus ini?')">Hapus
                                                        <i class="ti ti-circle-x"></i></button>
                                                </form>
                                                <a href="/dashboard/absen/{{ $absen->id }}/edit"
                                                    class="btn btn-warning m-1">Ubah <i class="ti ti-edit"></i></a>
                                                <a href="/dashboard/absen/{{ $absen->id }}"
                                                    class="btn btn-primary m-1">Detail <i
                                                        class="ti ti-arrow-narrow-right"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                Belum ada absen
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
