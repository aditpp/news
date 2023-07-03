<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class NewsController extends Controller
{
    public function index(Request $request){
        $country = $request->country ?? 'us';
        $category = $request->category ?? 'general';
        $url = "https://newsapi.org/v2/top-headlines?country=$country&category=$category&apiKey=a3766a4292ef471f854100011e1fdb6b";
        $client = new Client();
        $response = $client->request('GET', $url);
        $articles = json_decode($response->getBody()->getContents());

        $url1 = "https://newsapi.org/v2/top-headlines?country=us&category=sport&apiKey=a3766a4292ef471f854100011e1fdb6b";
        $client1 = new Client();
        $response = $client1->request('GET', $url1);
        $articles1 = json_decode($response->getBody()->getContents());

        $url2 = "https://newsapi.org/v2/top-headlines?country=us&category=technology&apiKey=a3766a4292ef471f854100011e1fdb6b";
        $client2 = new Client();
        $response = $client2->request('GET', $url2);
        $articles2 = json_decode($response->getBody()->getContents());
        
        $url3 = "https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=a3766a4292ef471f854100011e1fdb6b";
        $client3 = new Client();
        $response = $client3->request('GET', $url3);
        $articles3 = json_decode($response->getBody()->getContents());

        $url4 = "https://newsapi.org/v2/top-headlines?country=us&category=entertainment&apiKey=a3766a4292ef471f854100011e1fdb6b";
        $client4 = new Client();
        $response = $client4->request('GET', $url4);
        $articles4 = json_decode($response->getBody()->getContents());

        return view('index', compact('articles','articles1','articles2','articles3','articles4','category','country'));
    }

    public function general(Request $request){
        $country = $request->country ?? 'us';
        $category = $request->category ?? 'general';
        $selectedCountry = $country;
        $url = "https://newsapi.org/v2/top-headlines?country=$country&category=$category&apiKey=a3766a4292ef471f854100011e1fdb6b";
        $client = new Client();
        $response = $client->request('GET', $url);
        $articles = json_decode($response->getBody()->getContents());

        return view('element.general', compact('articles','category','country', 'selectedCountry'));
    }
   

}
