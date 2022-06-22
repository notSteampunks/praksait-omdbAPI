@extends('master')
@section('content')

<div class="container mt-5">
    <h2 class="text-center">Edit Students</h2>
    <hr>
    <form action="{{route('windows.update', $mahasiswa['id'])}}" method="post" target="_blank">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Name</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $mahasiswa['nama'] }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $mahasiswa['email'] }}">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Favorite Movies</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $mahasiswa['alamat'] }}">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="/siswa" class="btn btn-danger">Back</a>
    </form>
</div>

@endsection