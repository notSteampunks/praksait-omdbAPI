@extends('master')
@section('content')

<div class="container mt-5">
    <h2 class="text-center">Add Students</h2>
    <hr>
    <form action="/siswa/windows/store" method="post">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="nama" class="form-label">Name</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="John Doe">
        </div>
        <div class="mb-3">
            <label for="nim" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="john@example.com">
        </div>
        <div class="mb-3">
            <label for="prodi" class="form-label">Favorite Movies</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Harry Potter: Deathly Hallows">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="/siswa/windows" class="btn btn-danger">Back</a>
    </form>
</div>

@endsection