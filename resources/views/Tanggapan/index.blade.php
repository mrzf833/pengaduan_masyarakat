@extends('layouts.layout')
@section('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('asset/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-inline-block">
                <h6 class="m-0 font-weight-bold text-primary">Pengaduan</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Isi Laporan</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Isi Laporan</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @forelse ($aduans as $aduan)
                        <tr>
                            <td><p class="d-inline-block">{{ $aduan->isi_laporan }}</p></td>
                            <td><img src="{{ asset('storage/pengaduan/' . $aduan->foto) }}" width="234" alt=""></td>
                            <td>
                                <button type="button" class="btn btn-warning tanggapi" data-id="{{ $aduan->id }}">Tanggapi</button>
                                <form action="{{ route('adminOrPetugas.tanggapan.tolak',$aduan->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger mt-2 ml-2" data-id="{{ $aduan->id }}">Tolak</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tanggapi" tabindex="-1" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="">Tanggapi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                    <div class="form-group">
                        <textarea name="tanggapan" id="" cols="30" rows="10" class="form-control" placeholder="Silahkan Di Tanggapi Terlebih Dahulu" required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
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
    <script>
        $(document).on('click','.tanggapi',function(){
            let id = $(this).attr('data-id');
            let url = '{{ route("adminOrPetugas.tanggapan.store", ":id") }}'
            url = url.replace(':id',id)
            $('#tanggapi').modal('show');
            $('#tanggapi form').attr('action', url);
            console.log(url);
        })
    </script>
@endsection