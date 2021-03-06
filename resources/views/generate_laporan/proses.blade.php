@extends('layouts.layout')
@section('css')
    
  <!-- Custom styles for this page -->
  <link href="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="https://cdn.datatables.net/select/1.3.1/css/select.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="card shadow mb-4 mt-5">
            <div class="card-header py-3">
            <div class="d-inline-block">
                <h6 class="m-0 font-weight-bold text-primary">Data Pengaduan Yang Di Proses</h6>
            </div>
            <div class="float-right d-inline-block">
                <a href="{{ route('generateLaporan.all.proses') }}" class="btn btn-danger">Export To Pdf</a>
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" cellspacing="0" style="width: 100%">
                <thead style="width: 100%">
                    <tr>
                        <th>Isi Laporan</th>
                        <th>Foto</th>
                        <th>Pengaduan Dari</th>
                        <th>Tanggapan</th>
                        <th>Petugas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot style="width: 100%">
                    <tr>
                        <th>Isi Laporan</th>
                        <th>Foto</th>
                        <th>Pengaduan Dari</th>
                        <th>Tanggapan</th>
                        <th>Petugas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody style="width: 100%">
                @forelse ($aduans as $aduan)
                    <tr>
                        <td><p class="d-inline-block">{{ $aduan->isi_laporan }}</p></td>
                        <td><img src="{{ asset('storage/pengaduan/' . $aduan->foto) }}" width="234" alt=""></td>
                        <td>{{ $aduan->masyarakat->nama }}</td>
                        <td>{{ $aduan->tanggapan ? $aduan->tanggapan->tanggapan : 'Belum Di tanggapi' }}</td>
                        <td>{{ $aduan->tanggapan ? $aduan->tanggapan->petugas->nama : 'Belum Di tanggapi'}}</td>
                        <td>Di Proses</td>
                        <td><a href="{{ route('generateLaporan.all.select.pdf',$aduan->id) }}" class="btn btn-danger">Export To Pdf</a></td>
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
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

    
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable({
                select:true,
            });
        });
    </script>
@endsection