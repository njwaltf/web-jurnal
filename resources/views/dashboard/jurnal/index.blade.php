@extends('layouts.app')
@section('main')
    <h1>Jurnal Harian</h1>
    @if (auth()->user()->role === 'PJ')
        <div class="row">
            <div class="col-md-2">
                {{-- btn add --}}
                <a class="btn btn-info my-3" href="/dashboard/jurnal/create">Tambah Jurnal <i class="ti ti-plus"></i></a>
            </div>
            {{-- <div class="col-md-2">
                btn add
                <a class="btn btn-info my-3" href="{{ url('/jurnal/export') }}">Export Data PDF <i
                        class="ti ti-file-text"></i></a>
            </div> --}}
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
                <div class="card w-200">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Jurnal Harian</h5>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle table-hover display" id="myTable">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Tanggal</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Nama Guru</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Mapel</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">KD/CP</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Materi</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Tugas</h6>
                                        </th>
                                        {{-- <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">S</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">I</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">A</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Keterangan</h6>
                                        </th> --}}
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Action</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($jurnals as $jurnal)
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $jurnal->date }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $jurnal->teacher->name }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $jurnal->mapel->name }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $jurnal->kd }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $jurnal->material }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $jurnal->task }}</h6>
                                            </td>
                                            {{-- <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">
                                                    @if ($jurnal->sakit > 0)
                                                        {{ $jurnal->sakit }}
                                                    @else
                                                        Tidak ada
                                                    @endif
                                                </h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">
                                                    @if ($jurnal->izin > 0)
                                                        {{ $jurnal->izin }}
                                                    @else
                                                        Tidak ada
                                                    @endif
                                                </h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">
                                                    @if ($jurnal->alpha > 0)
                                                        {{ $jurnal->alpha }}
                                                    @else
                                                        Tidak ada
                                                    @endif
                                                </h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $jurnal->detail }}</h6>
                                            </td> --}}
                                            <td class="border-bottom-0">
                                                <form action="/dashboard/jurnal/{{ $jurnal->id }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger m-1" type="submit"
                                                        onclick="return confirm('Apakah kamu yakin ingin menghapus ini?')">Hapus
                                                        <i class="ti ti-circle-x"></i></button>
                                                </form>
                                                <a href="/dashboard/jurnal/{{ $jurnal->id }}/edit"
                                                    class="btn btn-warning m-1">Ubah <i class="ti ti-edit"></i></a>
                                                <a href="/dashboard/jurnal/{{ $jurnal->id }}"
                                                    class="btn btn-primary m-1">Detail <i
                                                        class="ti ti-arrow-narrow-right"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11" class="text-center">
                                                Belum ada guru
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
