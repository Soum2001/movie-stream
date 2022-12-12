<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\MovieDetails;
use Illuminate\Http\Request;
use App\Models\UserListDetails;


class CustomListController extends Controller
{
    public function customPage()
    {

        $img=array('poster_path'=>array(),'$list_name'=>array());
        $custom_list =  Playlist::select('playlist.id','playlist.list_name')
            ->join('user_list_details', 'user_list_details.playlist_id', '=', 'playlist.id')
            ->where('user_list_details.user_id', '=', session('id'))
            ->distinct()
            ->get();   
        foreach($custom_list as $list)
        {
            $back_img    =  MovieDetails::select('movie_details.poster_path')
            ->join('user_list_details', 'user_list_details.movie_details_id', '=', 'movie_details.id')
            ->where('user_list_details.user_id', Session('id'))
            ->where('user_list_details.playlist_id',$list['id'])
            ->limit(1)
            ->get();
            $img['poster_path'][] =  $back_img[0]['poster_path'];
            $img['list_name'][]   = $custom_list[0]['list_name'] ;  
            //array_push($img,$back_img[0]['poster_path']);
        }
        return view('CustomListPage',['custom_list' => $custom_list, 'img' => $img]);
    }
}

