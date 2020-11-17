@extends('layouts.layout')
@section('css')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection
@section('content')
    <div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-inline-block">
                    <h6 class="m-0 font-weight-bold text-primary">Create Petugas</h6>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('user.petugas.store') }}" enctype="multipart/form-data">
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
                        <label for="tel">Telepon</label>
                        <input type="number" class="form-control" id="tel" name="telp">
                    </div>
                    <div class="form-group">
                        <select name="role" id="" class="selectpicker form-control" data-live-search="true">
                            <option value="" disabled selected>-- select Role --</option>
                            @forelse ($roles as $role)
                                <option value="{{ $role->id }}">{{  $role->role }}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
@endsection