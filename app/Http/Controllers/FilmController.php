<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        return view('film');
    }

    public function show(Request $request) {
        if ($request->input('s')) {
            $client = new Client();
            $url = 'http://www.omdbapi.com/?apikey=37dd2f62&s=' . $request->input('s');
            $response = $client->request('GET', $url)->getBody()->getContents();   
            // return response()->json([
                //     'data' => json_decode($response)
                // ]);
                // dd($response);
            $response = json_decode($response, true);
            // dd($response);
            return view('film', ['film' => $response["Search"]]);
        } else {
            return view('film', ['film' => []]);
        }
    }
    
}
