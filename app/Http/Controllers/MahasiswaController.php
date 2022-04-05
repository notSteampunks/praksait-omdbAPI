<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index() {
        $client     = new Client();
        $url        = 'http://192.168.56.46:8080/api/siswa';
        $response   = $client->request('GET', $url)->getBody()->getContents();
        $response   = json_decode($response, true);
        return view('mahasiswa', ['mahasiswa' => $response['siswas']]);
    }
}
