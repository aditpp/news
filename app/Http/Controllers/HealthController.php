<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HealthController extends Controller
{
    public function health(Request $request){
        $country = $request->country ?? 'us';
        $category = $request->category ?? 'health';
        $selectedCountry = $country;
        // $pagesize = $request->pagesize ?? '6';
        $url = "https://newsapi.org/v2/top-headlines?country=$country&category=$category&apiKey=a3766a4292ef471f854100011e1fdb6b";
        $client = new Client();
        $response = $client->request('GET', $url);
        $articles = json_decode($response->getBody()->getContents());

        return view('element.health', compact('articles','category','country', 'selectedCountry'));
    }


}
