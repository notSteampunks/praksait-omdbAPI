@extends('master')
@section('content')

<div class="container mt-5">
    <h1 class="text-center">Ubuntu OS Student List</h1>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Favorite Movies</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $mhs)
            <tr>
                <th scope="row">{{ $mhs['id'] }}</th>
                <td>{{ $mhs['nama'] }}</td>
                <td>{{ $mhs['email'] }}</td>
                <td>{{ $mhs['alamat'] }}</td>
                <td class="d-flex">
                    <form class="inline-block ml-2" action="http://192.168.56.46:8080/api/siswa/{{ $mhs['id'] }}"
                        method="post" target="_blank">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr>
    <!-- Button Tambah Siswa-->
    <!-- <p align="center"><a href="{{ route('mahasiswa.create') }}" class="btn btn-success">Tambah Siswa</a> -->
    <p align="center"><a href="/siswa/windows" class="btn btn-primary">Windows OS Student List</a>
</div>

@endsection