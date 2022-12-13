<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\MovieDetails;
use Illuminate\Http\Request;
use App\Models\UserlistDetails;


class CustomListController extends Controller
{
    public function customPage()
    {

        $list = array();
        $custom_list =  Playlist::select('playlist.id', 'playlist.list_name')
            ->join('user_list_details', 'user_list_details.playlist_id', '=', 'playlist.id')
            ->where('user_list_details.user_id', '=', session('id'))
            ->distinct()
            ->get();
        $array = json_decode(json_encode($custom_list), true);
        $array_id = array_column($array, 'id');
        $array_name = array_column($array, 'list_name');
        $back_img = MovieDetails::select('movie_details.poster_path')
            ->join('user_list_details', 'user_list_details.movie_details_id', '=', 'movie_details.id')
            ->where('user_list_details.user_id', Session('id'))
            ->whereIn('user_list_details.playlist_id', $array_id)
            ->limit(count($custom_list))
            ->get();
        for ($i = 0; $i < count($custom_list); $i++) {
            $list[$array_id[$i]]['list_name'] = $array_name[$i];
            $list[$array_id[$i]]['poster_path'] = $back_img[$i]['poster_path'];
        }
        // echo '<pre>';
        // print_r($list);
        return view('CustomListPage', ['list' => $list]);
    }
    public function collectionList(Request $request)
    {
        $playlist_id = Playlist::select('id')->where('list_name', '=', $request->list_name)->get();
        $movie_details = MovieDetails::select('movie_details.poster_path', 'movie_details.movie_id')
            ->join('user_list_details', 'user_list_details.movie_details_id', '=', 'movie_details.id')
            ->where('user_list_details.user_id', Session('id'))
            ->where('user_list_details.playlist_id', $playlist_id[0]['id'])
            ->get();
          
        //print_r($movie_details_id);
        //print_r($movie_details_id[0]['movie_details_id']);    
        //echo ($request->list_name);
        return view('ListCollection', ['movie' => $movie_details ,'list_name'=>$request->list_name]);
    }
}
