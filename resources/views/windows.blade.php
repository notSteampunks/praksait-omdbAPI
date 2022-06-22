@extends('master')
@section('content')

<div class="container mt-5">
    <h1 class="text-center">Windows OS Student List</h1>
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
            @foreach ($post as $data)
            <tr>
                <th scope="row">{{ $data['id'] }}</th>
                <td>{{ $data['nama'] }}</td>
                <td>{{ $data['email'] }}</td>
                <td>{{ $data['alamat'] }}</td>
                <td class="d-flex">
                    <form class="inline-block ml-2" action="/siswa/windows/{{ $data['id'] }}/edit" method="post">
                        @csrf
                        @method('GET')
                        <button class="btn btn-info text-light">Edit</button>
                    </form>
                    <form class="inline-block ml-2" action="/siswa/{{ $data['id'] }}" method="post" target="_blank">
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
    <p align="center"><a href="{{ route('windows.create') }}" class="btn btn-success">Add Students</a>
</div>

@endsection