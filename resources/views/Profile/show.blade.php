@extends('layouts.layout')
@section('css')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <div class="">
            <h5 class="d-inline-block">Edit Profile</h5>
        </div>
    </div>
    <div class="card-body">
            <form action="{{ route('adminOrPetugas.profile.edit') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Jangan Diisi Kalau Tidak Mau diganti">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->petugas->nama }}">
                </div>
                <div class="form-group">
                    <label for="telp">Telepon</label>
                    <input type="number" class="form-control" id="telp" name="telp" value="{{ $user->petugas->telp }}">
                </div>
                <div class="form-group">
                    <select name="role" id="" class="selectpicker form-control" data-live-search="true">
                        <option value="" disabled>-- Select Role --</option>
                        @forelse ($roles as $role)
                            <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{ $role->role }}</option>
                        @empty
                            
                        @endforelse
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    </div>
</div>
@endsection
@section('script')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
@endsection