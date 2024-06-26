<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {   
        return view('home');
    }

    public function search(Request $req)
    {
        $currentDate = new DateTime();
        $checkInDate = strtotime($req->check_in_date);
        $checkOutDate = strtotime($req->check_out_date);
        $currentDate = strtotime($currentDate->format('Y-m-d H:i:s'));

        if($checkInDate < $currentDate || $checkOutDate < $currentDate) {
            return redirect()->route('home')->with('error', 'The check-in or check-out date cannot be earlier than the current date');
        }
        if($checkOutDate < $checkInDate) {
            return redirect()->route('home')->with('error', 'The check-out date cannot be earlier than the check-in date');
        }

        $apiKey = "930ba822223774a9733bcacdeefce2ef1c6d81a3fd382b4601bc2888b1e27d03"; 
        $response = Http::withUrlParameters([
            'api_key' => $apiKey,
            'q' => $req->q,
            'check_in_date' => $req->check_in_date,
            'check_out_date' => $req->check_out_date,
            'adults' => $req->adults,
        ])->get('https://serpapi.com/search?engine=google_hotels&api_key={api_key}&q={q}&check_in_date={check_in_date}&check_out_date={check_out_date}&adults={adults}');


        $hotels = $response->json();
        return view('searchhotels', compact('hotels'));
    }

    public function filterSearch(Request $req)
    {
        $currentDate = new DateTime();
        $checkInDate = strtotime($req->check_in_date);
        $checkOutDate = strtotime($req->check_out_date);
        $currentDate = strtotime($currentDate->format('Y-m-d H:i:s'));
    
        if($checkInDate < $currentDate || $checkOutDate < $currentDate) {
            return redirect()->route('home')->with('error', 'The check-in or check-out date cannot be earlier than the current date');
        }
        if($checkOutDate < $checkInDate) {
            return redirect()->route('home')->with('error', 'The check-out date cannot be earlier than the check-in date');
        }
    
        $apiKey = "930ba822223774a9733bcacdeefce2ef1c6d81a3fd382b4601bc2888b1e27d03"; 
        $response = Http::withUrlParameters([
            'api_key' => $apiKey,
            'q' => $req->q,
            'check_in_date' => $req->check_in_date,
            'check_out_date' => $req->check_out_date,
            'adults' => $req->adults,
            'sort_by' => $req->sort_by,
            'min_price' => $req->min_price,
            'max_price' => $req->max_price,
        ])->get('https://serpapi.com/search?engine=google_hotels&api_key={api_key}&q={q}&check_in_date={check_in_date}&check_out_date={check_out_date}&adults={adults}&sort_by={sort_by}&min_price={min_price}&max_price={max_price}');
    
        $hotels = $response->json();
        return view('searchhotels', compact('hotels'));
        
    }

    public function nextPage(Request $req)
    {
        $apiKey = "930ba822223774a9733bcacdeefce2ef1c6d81a3fd382b4601bc2888b1e27d03";
        $q = $req->next_page.'&api_key='.$apiKey;
        $response = Http::get($q);
        $hotels = $response->json();
        
        return view('searchhotels', compact('hotels'));

    }
}
