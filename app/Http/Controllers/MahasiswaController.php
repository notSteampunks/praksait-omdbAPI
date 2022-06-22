<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use GuzzleHttp\Client;

class MahasiswaController extends Controller
{
    public function index() {
        $client     = new Client();
        $url        = 'http://192.168.56.46:8080/api/siswa';
        $response   = $client->request('GET', $url)->getBody()->getContents();
        $response   = json_decode($response, true);
        return view('mahasiswa', ['mahasiswa' => $response['siswas']]);
    }
    
    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
        ]);
        $mahasiswa = Post::create($request->all());
        return response()->json([
            'mahasiswa' => $mahasiswa
        ]);
    }

    public function edit($id)
    {
        $client     = new Client();
        $url        = 'http://192.168.56.46:8080/api/siswa/' . $id;
        $mahasiswa  = $client->request('GET', $url)->getBody()->getContents();
        $mahasiswa  = json_decode($mahasiswa);
        // dd($mahasiswa->siswa);
        return view('mahasiswa.edit', [
            'mahasiswa' => $mahasiswa->siswa       
        ]);
    }

    public function update(Post $mahasiswa, Request $request)
    {
        $mahasiswa->update($request->all());
        return response()->json([
            'mahasiswa' => $mahasiswa
        ]);
    }

}