@extends('masyarakat.layouts.layout')
@section('content')
<div class="container pt-5">
    <div class="card">
        <div class="card-header">
            <h5 class="d-inline-block">Profile</h5>
            <form action="{{ route('logout') }}" method="post" enctype="multipart/form-data" class="float-right d-inline-block ml-3">
                @csrf
                <button type="submit" class="btn btn-danger">LogOut</button>
            </form>
            <a href="{{ route('masyarakat.profile.show') }}" class="btn btn-info float-right d-inline-block">Edit</a>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <th bgcolor="#FBFBFB">Username</th>
                        <td>{{ $user->user->username }}</td>
                    </tr>
                    <tr>
                        <th bgcolor="#FBFBFB">Nama</th>
                        <td>{{ $user->nama }}</td>
                    </tr>
                    <tr>
                        <th bgcolor="#FBFBFB">Nik</th>
                        <td>{{ $user->nik }}</td>
                    </tr>
                    <tr>
                        <th bgcolor="#FBFBFB">Telepon</th>
                        <td>{{ $user->telp }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection