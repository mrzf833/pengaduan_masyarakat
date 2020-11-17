@extends('layouts.layout')
@section('css')
    
@endsection
@section('content')
    <div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-inline-block">
                    <h6 class="m-0 font-weight-bold text-primary">Create Masyarakat</h6>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('user.masyarakat.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="number" class="form-control" id="nik" name="nik">
                    </div>
                    <div class="form-group">
                        <label for="tel">Telepon</label>
                        <input type="number" class="form-control" id="tel" name="telp">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    
@endsection