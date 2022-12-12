<?php

namespace App\Http\Controllers;

use App\Models\ListDetail;
use App\Models\Playlist;
use App\Models\MovieDetails;
use App\Models\UserlistDetails;

use Illuminate\Contracts\Session\Session;

use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class AddToListController extends Controller
{
    public function checkUser(Request $request)
    {
        $output = array('dbStatus' => '');
        if (!empty(session('id'))) {
            $output['dbStatus']     = 1;
        } else {
            $output['dbStatus']     = 0;
        }
        return response()->json($output);
    }

    public function addNewList(Request $request)
    {
        //echo($request->movie_id);
        $output = array('dbStatus' => '', 'dbMessage' => '');
        $poster_path = $request->poster_path;

        $check  = Playlist::where('list_name', $request->list_name)->get(); //List is existing or not
        //echo(sizeof($check));
        if (!sizeof($check)) {
            $playlist       = new Playlist;
            $playlist->list_name = $request->list_name;
            if ($playlist->save()) {
                //echo($playlist->id);
                $movieDetails              = new MovieDetails;
                $movieDetails->poster_path = $poster_path;
                //$movieDetails->list_id     = $playlist->id;
                $movieDetails->movie_id    = $request->movie_id;
                if ($movieDetails->save()) {
                    $userlistDetails                    = new UserlistDetails();
                    $userlistDetails->user_id           = Session('id');
                    $userlistDetails->playlist_id       = $playlist->id;
                    $userlistDetails->movie_details_id  = $movieDetails->id;

                    if ($userlistDetails->save()) {
                        $output['dbStatus']   = 1;
                        $output['dbMessage']  = 'New List Created';
                    } else {
                        $output['dbStatus']   = 0;
                        $output['dbMessage']  = 'Some Error Occurred';
                    }
                } else {
                    $output['dbStatus']   = 0;
                    $output['dbMessage']  = 'Some Error Occurred';
                }
            } else {
                $output['dbStatus']   = 0;
                $output['dbMessage']  = 'Some Error Occurred.';
            }
        } else {
            $output['dbStatus']   = 0;
            $output['dbMessage']  = 'This list already exist.Please select to add over there';
        }
        return response()->json($output);
    }

    public function list_creation_page()
    {
        return view('CreateNewList');
    }
    public function addToList(Request $request)
    {
        $output = array('dbStatus' => '', 'dbMessage' => '');
        //$check_playlist  = Playlist::where('list_name', $request->list_name)->get(); //List is existing or not
        $check_movie_list = MovieDetails::where('movie_id', $request->movie_id)->get(); //that particular movie is existing or not
        // print_r($check_movie_list[0]['movie_id']);
        if (sizeof($check_movie_list)) {
            $check_user_list  = UserlistDetails::where('movie_details_id', $check_movie_list[0]['id'])
                ->where('user_id', Session('id'))
                ->get();

            if (!sizeof($check_user_list)) {
                $userlistDetails                    = new UserlistDetails();
                $userlistDetails->user_id           = Session('id');
                $userlistDetails->playlist_id       = $request->id;
                $userlistDetails->movie_details_id  = $check_movie_list[0]['id'];
                if ($userlistDetails->save()) {
                    $output['dbStatus']   = 1;
                    $output['dbMessage']  = 'New Movie Added';
                } else {
                    $output['dbStatus']   = 0;
                    $output['dbMessage']  = 'Some Error Occurred';
                }
            }else{
                $output['dbStatus']   = 0;
                $output['dbMessage']  = 'Movie already exist in list';
            }
        } else {
            $movieDetails              = new MovieDetails;
            $movieDetails->poster_path = $request->poster_path;
            $movieDetails->movie_id    = $request->movie_id;
            if ($movieDetails->save()) {
                $userlistDetails                    = new UserlistDetails();
                $userlistDetails->user_id           = Session('id');
                $userlistDetails->playlist_id       = $request->id;
                $userlistDetails->movie_details_id  = $movieDetails->id;
                if ($userlistDetails->save()) {
                    $output['dbStatus']   = 1;
                    $output['dbMessage']  = 'New Movie Added';
                } else {
                    $output['dbStatus']   = 0;
                    $output['dbMessage']  = 'Some Error Occurred';
                }
            } else {
                $output['dbStatus']   = 0;
                $output['dbMessage']  = 'Some Error Occurred';
            }
        }

        return response()->json($output);
    }
}
