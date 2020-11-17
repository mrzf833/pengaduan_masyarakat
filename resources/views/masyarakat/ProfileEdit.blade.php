@extends('masyarakat.layouts.layout')
@section('content')
<div class="container pt-5">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="d-inline-block">Edit Profile</h5>
                <a href="{{ route('masyarakat.profile.index') }}" class="btn btn-warning">Back</a>
            </div>
        </div>
        <div class="card-body">
                <form action="{{ route('masyarakat.profile.edit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ $user->user->username }}">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Jangan Diisi Kalau Tidak Mau diganti">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="number" class="form-control" id="nik" name="nik" value="{{ $user->nik }}">
                    </div>
                    <div class="form-group">
                        <label for="telp">Telepon</label>
                        <input type="number" class="form-control" id="telp" name="telp" value="{{ $user->telp }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
    </div>
</div>
@endsection