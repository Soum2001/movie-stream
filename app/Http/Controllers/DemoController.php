<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function demo(){
       // $tmdb_id = 436270; //Black Adam (2022) Movie TMDB ID
        $data = Http::asJson()
            ->get(config('services.tmdb.endpoint').'movie/popular?api_key='.config('services.tmdb.api'))->collect();

        return view('Trending',['movie_data' => $data]);
    }
    public function fetch_cast(Request $request){
        $movie_id = $request->movie_id;
        $movie = Http::asJson()
            ->get(config('services.tmdb.endpoint').'movie/'.$movie_id.'?api_key='.config('services.tmdb.api'))->collect();
      
            echo '<pre>';
            print_r($movie);
            exit;

        $cast = Http::asJson()
            ->get(config('services.tmdb.endpoint').'movie/'.$movie_id.'/credits?api_key='.config('services.tmdb.api'))->collect();
          
            //return response()->json($output);
            // return view('Cast',['cast_details' => $cast,'movie'=>$movie]);  
    }

}
