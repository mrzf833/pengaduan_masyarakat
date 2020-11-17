@extends('layouts.layout')
@section('css')
    
  <!-- Custom styles for this page -->
  <link href="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User</h1>
    <div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-inline-block">
                <h6 class="m-0 font-weight-bold text-primary">User masyarakat</h6>
            </div>
            <div class="float-right d-inline-block">
                <a href="{{ route('user.masyarakat.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="masyarakat" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Nik</th>
                    <th>Telepon</th>
                    <th>Created At</th>
                    <th>Update At</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Nik</th>
                    <th>Telepon</th>
                    <th>Created At</th>
                    <th>Update At</th>
                    <th>Aksi</th>
                </tr>
                </tfoot>
                <tbody>
                    @forelse ($masyarakats as $masyarakat)
                        <tr>
                            <td>{{ $masyarakat->nama }}</td>
                            <td>{{ $masyarakat->user->username }}</td>
                            <td>{{ $masyarakat->nik }}</td>
                            <td>{{ $masyarakat->telp }}</td>
                            <td>{{ $masyarakat->created_at }}</td>
                            <td>{{ $masyarakat->updated_at }}</td>
                            <td>
                                <div class="d-inline-block">
                                    <form action="{{ route('user.masyarakat.destroy',$masyarakat->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"> delete</i></button>
                                    </form>
                                </div>
                                <div class="d-inline-block">
                                    <a href="{{ route('user.masyarakat.show',$masyarakat->id) }}" class="btn btn-warning"><i class="fas fa-edit"> edit</i></a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">Data Belum Ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-inline-block">
                    <h6 class="m-0 font-weight-bold text-primary">User Petugas</h6>
                </div>
                <div class="float-right d-inline-block">
                    <a href="{{ route('user.petugas.create') }}" class="btn btn-primary">Create</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="petugas" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Telepon</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Update At</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Telepon</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Update At</th>
                        <th>Aksi</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @forelse ($petugass as $petugas)
                            <tr>
                                <td>{{ $petugas->nama }}</td>
                                <td>{{ $petugas->user->username }}</td>
                                <td>{{ $petugas->telp }}</td>
                                <td>{{ $petugas->user->roles->role }}</td>
                                <td>{{ $petugas->created_at }}</td>
                                <td>{{ $petugas->updated_at }}</td>
                                <td>
                                    <div class="d-inline-block">
                                        <form action="{{ route('user.petugas.destroy', $petugas->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"> delete</i></button>
                                        </form>
                                    </div>
                                    <div class="d-inline-block">
                                        <a href="{{ route('user.petugas.show',$petugas->id) }}" class="btn btn-warning"><i class="fas fa-edit"> edit</i></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Data Belum Ada</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>
            </div>
            </div>
    </div>
@endsection
@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('asset/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#masyarakat').DataTable();
            $('#petugas').DataTable();
        });
    </script>
@endsection