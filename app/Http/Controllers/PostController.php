<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
        $post   = Post::all();
        return view('windows')->with('post', $post);
    }

    public function show(Request $request)
    {
        return view('windows.create');
    }
    
    public function storewin(Request $request)
    {
        //insert data ke table ubuntu os
        $client     = new Client();
        $res = $client->request('POST', 'http://192.168.56.46:8080/api/siswa',[
            'form_params' => [
                'nama' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->alamat,
            ]
        ]);
        $res = json_decode($res->getBody()->getContents());

        // insert data ke table windows os
        DB::table('mahasiswa')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat
        ]);

        // alihkan halaman ke halaman mahasiswa
        return redirect('/siswa/windows');
    }

    public function destroy($id){
        $client     = new Client();
        $url        = 'http://192.168.56.46:8080/api/siswa/' . $id;
        $response   = $client->request('DELETE', $url)->getBody()->getContents();
        $response   = json_decode($response, true);

        //hapus data di windows os
        DB::table('mahasiswa')->where('id', $id)->delete();

        return redirect('/siswa/windows');
    }

    public function edit($id){
        $client     = new Client();
        $url        = 'http://192.168.56.46:8080/api/siswa/' . $id;
        $response   = $client->request('GET', $url)->getBody()->getContents();
        $response   = json_decode($response, true);
        // dd($response->mahasiswa);
        return view('windows.edit', [
            'mahasiswa' => $response['siswa']
        ]);
    }

    public function update(Request $request, $id){
        $client     = new Client();
        $url        = 'http://192.168.56.46:8080/api/siswa/' . $id;
        $response   = $client->request('PUT', $url,[
            'form_params' => [
                'nama' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->alamat,
            ]
        ]);
        $response   = json_decode($response->getBody()->getContents());

        DB::table('mahasiswa')->where('id', $id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat
        ]);
        return redirect('/siswa/windows');
    }
}