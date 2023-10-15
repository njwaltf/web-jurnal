@extends('layouts.app')
@section('main')


    <h1>Daftar Rombel/Kelas</h1>
    <div class="row">
        <div class="col-md-2">
            {{-- btn add --}}
            <a class="btn btn-info my-3" href="/dashboard/rombel/create">Tambah Rombel <i class="ti ti-plus"></i></a>
        </div>
        <div class="col-md-2">
            {{-- btn add --}}
            <a class="btn btn-info my-3" href="{{ url('/rombel/export') }}">Export Data PDF <i class="ti ti-file-text"></i></a>
        </div>
    </div>

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
                        <h5 class="card-title fw-semibold mb-4">Daftar Rombel</h5>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle table-hover display" id="myTable">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">No</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Nama Rombel</h6>
                                        </th>
                                        @if (auth()->user()->role === 'Admin')
                                            <th class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">Action</h6>
                                            </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (auth()->user()->role === 'PJ')
                                        <h1>You dont have permission for access this data</h1>
                                    @else
                                        @forelse ($rombels as $rombel)
                                            <tr>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">{{ $rombel->name }}</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <form action="/dashboard/rombel/{{ $rombel->id }}" method="post"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger m-1" type="submit"
                                                            onclick="return confirm('Apakah kamu yakin ingin menghapus ini?')">Hapus
                                                            <i class="ti ti-circle-x"></i></button>
                                                    </form>
                                                    <a href="/dashboard/rombel/{{ $rombel->id }}/edit"
                                                        class="btn btn-warning m-1">Ubah <i class="ti ti-edit"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">
                                                    Belum ada rombel
                                                </td>
                                            </tr>
                                        @endforelse
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection