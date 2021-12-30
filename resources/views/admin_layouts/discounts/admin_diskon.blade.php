@extends('admin_layouts.admin_master')
@section('admin_content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            @if (session('sukses'))
                <div class="alert alert-success" role="alert">
                    {{ session('sukses') }}
                </div>
            @endif
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-center">Diskon</h6>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <!-- Circle Buttons (Default) -->
                    <a href="/admin/diskon/buat" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Diskon</span>
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Presentase Diskon (%)</th>
                                <th class="text-center">Start</th>
                                <th class="text-center">End</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_diskon as $no => $diskon)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $diskon->percentage }}</td>
                                <td>{{ $diskon->start }}</td>
                                <td>{{ $diskon->end }}</td>
                                <td class="text-center">
                                    <a href="/admin/diskon/{{ $diskon->id }}/viewdiskon" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="/admin/diskon/{{ $diskon->id }}/editdiskon" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="/admin/diskon/{{ $diskon->id }}/deletediskon" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Anda yakin ingin mengedit data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                    </form>
                                    {{-- <a href="/admin/diskon/{{ $diskon->id }}/deletediskon" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a> --}}
                                </td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.container-fluid -->
    
@endsection