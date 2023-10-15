@extends('layouts.app')
@section('main')
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 my-3">
            <h2><a href="/dashboard/jurnal"><i class="ti ti-arrow-left"></i></a> Detail Jurnal</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title fw-semibold m-1">Informasi Utama</h5>
                </div>
                <div class="card-body p-3">
                    <div class="row my-3">
                        <div class="col-lg-6">
                            <strong class="m-1">Tanggal</strong>
                        </div>
                        <div class="col-lg-6">
                            <p class="m-1">{{ $jurnal->date }}</p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-6 col-sm-12">
                            <strong class="m-1">Nama Guru</strong>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <p class="m-1">{{ $jurnal->teacher->name }}</p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-6 col-sm-12">
                            <strong class="m-1">Rombel</strong>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <p class="m-1">{{ $jurnal->rombel->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title fw-semibold m-1">Informasi Materi</h5>
                </div>
                <div class="card-body p-3">
                    <div class="row my-3">
                        <div class="col-lg-6">
                            <strong class="m-1">Mata Pelajaran</strong>
                        </div>
                        <div class="col-lg-6">
                            <p class="m-1">{{ $jurnal->mapel->name }}</p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-6 col-sm-12">
                            <strong class="m-1">Materi</strong>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <p class="m-1">{{ $jurnal->material }}</p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-6 col-sm-12">
                            <strong class="m-1">Tugas</strong>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <p class="m-1">{{ $jurnal->task }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title fw-semibold m-1">Informasi Absensi</h5>
                </div>
                <div class="card-body p-3">
                    <div class="row my-3">
                        <div class="col-lg-6 col-sm-12">
                            <strong class="m-1">Jumlah Kehadiran</strong>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <p class="m-1">
                                @if ($jurnal->hadir > 0)
                                    {{ $jurnal->hadir }}
                                @else
                                    Tidak ada
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-6 col-sm-12">
                            <strong class="m-1">Jumlah Sakit</strong>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <p class="m-1"
                                @if ($jurnal->sakit > 0) style="color:darkorange;"
                            @else
                            style="color:black;" @endif>
                                @if ($jurnal->sakit > 0)
                                    {{ $jurnal->sakit }}
                                @else
                                    Tidak ada
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-6 col-sm-12">
                            <strong class="m-1">Jumlah Izin</strong>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <p class="m-1"
                                @if ($jurnal->izin > 0) style="color:green;"
                            @else
                            style="color:black;" @endif>
                                @if ($jurnal->izin > 0)
                                    {{ $jurnal->izin }}
                                @else
                                    Tidak ada
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-lg-6 col-sm-12">
                            <strong class="m-1">Jumlah Alpha</strong>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <p class="m-1"
                                @if ($jurnal->alpha > 0) style="color:red;"
                            @else
                            style="color:black;" @endif>
                                @if ($jurnal->alpha > 0)
                                    {{ $jurnal->alpha }}
                                @else
                                    Tidak ada
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
