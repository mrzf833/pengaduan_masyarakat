@extends('laporan_pdf.layout')
@section('css')
    <style>
        .border{
            border: 1px solid black;
        }
        .mt-3{
            margin-top: 15px;
        }
        .p-3{
            padding: 10px;
        }
    </style>
@endsection
@section('content')
        @forelse ($aduans as $aduan)
            <div class="border mt-3 p-3">
                <p><b>Nama : </b> {{ $aduan->masyarakat->nama }}</p>
                <p><b>Telepon : </b> {{ $aduan->masyarakat->telp }}</p>
                <p><b>Status : </b> {{ $aduan->status !== '0' ? $aduan->status : 'Di Tolak'}}</p>
                <div>
                    <p><b>Foto : </b> 
                        @if ($aduan->foto)
                        <img src="{{ asset('storage/pengaduan/' . $aduan->foto) }}" alt="" style="width:100%;max-width:380px">
                        @else
                        Foto Tidak Ada
                        @endif
                    </p>
                </div>
                <p><b>Laporan : </b> {{ $aduan->isi_laporan }}</p>
                <p><b>Nama Petugas : </b> {{ $aduan->tanggapan ? $aduan->tanggapan->petugas->nama : 'Belum Di Tanggapi' }}</p>
                <p><b>Tanggapan Petugas : </b> {{ $aduan->tanggapan ? $aduan->tanggapan->tanggapan : 'Belum Di Tanggapi' }}</p>
            </div>
        @empty
            
        @endforelse
@endsection
@section('script')
    
@endsection