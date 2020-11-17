@extends('masyarakat.layouts.layout')
@section('css')
  <!-- Custom styles for this page -->
  <link href="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="card shadow mb-4 mt-5">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan Anda</h6>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Isi Laporan</th>
                        <th>Foto</th>
                        <th>Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Isi Laporan</th>
                            <th>Foto</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @forelse ($aduans as $aduan)
                        <tr>
                            <td><p class="d-inline-block">{{ $aduan->isi_laporan }}</p></td>
                            <td><img src="{{ asset('storage/pengaduan/' . $aduan->foto) }}" width="234" alt=""></td>
                            <td>
                                @if ($aduan->status === '0')
                                <div class="bg-danger pt-2 pb-2 pl-3 pr-3 d-flex justify-content-center align-items-center rounded" style="width: 100px">
                                    <p class="text-white m-0">Di Tolak</p>
                                </div>
                                @endif
                                @if ($aduan->status === 'proses')
                                <div class="bg-warning pt-2 pb-2 pl-3 pr-3 d-flex justify-content-center align-items-center rounded" style="width: 100px">
                                    <p class="text-white m-0">Di Proses</p>
                                </div>
                                @endif
                                @if ($aduan->status === 'selesai')
                                <div class="bg-success pt-2 pb-2 pl-3 pr-3 d-flex justify-content-center align-items-center rounded" style="width: 100px">
                                    <p class="text-white m-0">Di Terima</p>
                                </div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        
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

    <!-- Page level custom scripts -->
    <script src="{{ asset('asset/js/demo/datatables-demo.js') }}"></script>
@endsection