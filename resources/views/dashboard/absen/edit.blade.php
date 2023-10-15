@extends('layouts.app')
@section('main')
    <!--  Row 1 -->
    <div class="row">
        <div class="col-lg-12 my-3">
            <h2><a href="/dashboard/absen"><i class="ti ti-arrow-left"></i></a> Edit Absen</h2>
        </div>
    </div>
    <form action="/dashboard/absen/{{ $absen->id }}" method="post">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Absensi</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="date" class="form-label">Tanggal Absensi</label>
                                    <input type="text" class="form-control" id="date"
                                        value="{{ old('date', $absen->date) }}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card w-100">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-semibold mb-4">Daftar Nama</h5>
                                        <div class="table-responsive">
                                            <table class="table text-nowrap mb-0 align-middle table-hover display"
                                                id="myTable">
                                                <thead class="text-dark fs-4">
                                                    <tr>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">No</h6>
                                                        </th>
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">Nama Siswa</h6>
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
                                                        <th class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-0">Keterangan</h6>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <form action="/dashboard/absen/{{ $absen->id }}" method="post">
                                                        @csrf
                                                        {{-- @method('put') --}}
                                                        @forelse ($absen_details as $absen_detail)
                                                            <tr>
                                                                <td class="border-bottom-0">
                                                                    <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                                                </td>
                                                                <td class="border-bottom-0">
                                                                    <h6 class="fw-semibold mb-1">
                                                                        <input type="hidden" name="student_id[]"
                                                                            value="{{ $absen_detail->student_id }}">
                                                                        <input type="hidden"
                                                                            value="{{ $absen_detail->date_detail }}"
                                                                            name="date[]">
                                                                        <input type="hidden"
                                                                            value="{{ $absen_detail->rombel_id }}"
                                                                            name="rombel_id[]">

                                                                        {{ $absen_detail->student->full_name }}
                                                                    </h6>
                                                                </td>
                                                                <td class="border-bottom-0">
                                                                    <input type="checkbox" name="attendance[]"
                                                                        id="" value="Hadir"
                                                                        @if ($absen_detail->attendance === 'Hadir') checked @endif>
                                                                </td>
                                                                <td class="border-bottom-0">
                                                                    <input type="checkbox" name="attendance[]"
                                                                        id="" value="Izin"
                                                                        @if ($absen_detail->attendance === 'Izin') checked @endif>
                                                                </td>
                                                                <td class="border-bottom-0">
                                                                    <input type="checkbox" name="attendance[]"
                                                                        id="" value="Sakit"
                                                                        @if ($absen_detail->attendance === 'Sakit') checked @endif>
                                                                </td>
                                                                <td class="border-bottom-0">
                                                                    <input type="checkbox" name="attendance[]"
                                                                        id="" value="Alpha"
                                                                        @if ($absen_detail->attendance === 'Alpha') checked @endif>
                                                                </td>
                                                                <td class="border-bottom-0">
                                                                    <input type="text"
                                                                        class="form-control @error('detail') is-invalid @enderror"
                                                                        id="detail" name="detail[]"
                                                                        value="{{ old('detail', $absen_detail->detail) }}">
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="6" class="text-center">
                                                                    Belum ada Siswa
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </form>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <button type="submit" class="btn btn-warning" style="margin-right: 15px">Edit Data absen <i
                        class="ti ti-pencil"></i></button>
                <a href="/dashboard/absen" class="btn btn-outline-warning">Batal</a>
            </div>
        </div>
    </form>
    {{-- @dd(url()->full()) --}}
@endsection
