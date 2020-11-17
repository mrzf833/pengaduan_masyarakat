@extends('layouts.layout')
@section('css')
    
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="d-inline-block">Profile</h5>
        <a href="{{ route('adminOrPetugas.profile.show') }}" class="btn btn-info float-right d-inline-block">Edit</a>
    </div>
    <div class="card-body">
        <table class="table">
            <tbody>
                <tr>
                    <th bgcolor="#FBFBFB">Username</th>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <th bgcolor="#FBFBFB">Nama</th>
                    <td>{{ $user->petugas->nama }}</td>
                </tr>
                <tr>
                    <th bgcolor="#FBFBFB">Role</th>
                    <td>{{ $user->roles->role }}</td>
                </tr>
                <tr>
                    <th bgcolor="#FBFBFB">Telepon</th>
                    <td>{{ $user->petugas->telp }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection