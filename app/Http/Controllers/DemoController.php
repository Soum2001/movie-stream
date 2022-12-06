<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function demo()
    {
        // $tmdb_id = 436270; //Black Adam (2022) Movie TMDB ID
        $movie = Http::asJson()
            ->get(config('services.tmdb.endpoint') . 'movie/popular?api_key=' . config('services.tmdb.api'))->collect();
        $tv = Http::asJson()
            ->get(config('services.tmdb.endpoint') . 'tv/popular?api_key=' . config('services.tmdb.api'))->collect();

        return view('Trending', ['movie_data' => $movie, 'tv' => $tv]);
    }
    public function fetchCast(Request $request)
    {
        $movie_id = $request->movie_id;
        $movie = Http::asJson()
            ->get(config('services.tmdb.endpoint') . 'movie/' . $movie_id . '?api_key=' . config('services.tmdb.api'))->collect();
        $cast = Http::asJson()
            ->get(config('services.tmdb.endpoint') . 'movie/' . $movie_id . '/credits?api_key=' . config('services.tmdb.api'))->collect();
        return view('Cast', ['cast_details' => $cast, 'movie' => $movie]);
    }
    public function fetchPerson(Request $request)
    {
        $person_id  =   $request->person_id;
        $person = Http::asJson()
            ->get(config('services.tmdb.endpoint') . 'person/' . $person_id . '?api_key=' . config('services.tmdb.api'))->collect();

        return view('Person', ['person_details' => $person]);
    }
    public function search(Request $request)
    {
        $query  = $request->search_item;
            
        $search_item = Http::asJson()
            ->get(config('services.tmdb.endpoint') . 'search/movie?api_key=' . config('services.tmdb.api') . '&query=' . $query)->collect();
     
           
        $output = '';
        foreach($search_item['results'] as $search)
        {
            $search_poster = $search['poster_path'];
            $title = $search['original_title'];
            $release_date = $search['release_date'];
            $overview = $search['overview'];
            $output .= '<div class="card">
                            <div class="card-body row">
                                <div class="col-5 text-center d-flex align-items-center justify-content-center">
                                    <img class="img-fluid pad" src="https://www.themoviedb.org/t/p/w220_and_h330_face' . $search_poster . '" alt="Photo" style="object-fit: contain;width: 100%;height: 300px;">  
                                </div>
                                <div class="col-7">
                                <h3><span><b>'.$title.'</b></span></h3>

                                <h5><span><b>'.$release_date.'</b></span></h5>
                                <p>'.$overview.'</p>
                                </div>
                            </div>
                        </div>';
        }
        return response()->json($output);
    }

}
