<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use GuzzleHttp\Client;

class PostController extends Controller
{
    public function index()
    {
        return response()->json([
            'siswas' => Post::all()
        ]);
    }

    public function show(Post $siswa)
    {
        return response()->json([
            'siswa' => $siswa
        ]);
    }
    public function store(Request $request)
    {
        $siswa = Post::create($request->all());
        return response()->json([
            'siswa' => $siswa
        ]);
    }
    public function update(Request $request, Post $siswa)
    {
        $siswa->update($request->all());
        return response()->json([
            'siswa' => $siswa
        ]);
    }
    public function destroy(Post $siswa)
    {
        $siswa->delete();
        return response()->json([
            'success' => true
        ]);
    }
    public function show_data_to_browser()
    {
        $client = new Client();
        $response =  $client->request('GET', 'http://192.168.56.46:8080/api/siswa/');
        return response()->json([
            'siswas' => json_decode($response->getBody()->getContents())
        ]);
    }

}
