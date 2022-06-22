@extends('master')
@section('content')

<div class="container mt-5">
    <h2 class="text-center">Add Ubuntu Students</h2>
    <hr>
    <form action="http://192.168.56.46:8080/api/siswa" method="post" target="_blank">
        <div class="mb-3">
            <label for="nama" class="form-label">Name</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Joko Susanto">
        </div>
        <div class="mb-3">
            <label for="nim" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="joko@example.com">
        </div>
        <div class="mb-3">
            <label for="prodi" class="form-label">Favorite Movies</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Jalan Bunga">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="/siswa" class="btn btn-danger">Back</a>
    </form>
</div>

@endsection