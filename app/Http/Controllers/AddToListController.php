<?php

namespace App\Http\Controllers;

use App\Models\ListDetail;
use App\Models\Playlist;
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
        $check  = Playlist::select('list')->where('user_id', '=', Session('id'))->get(); //List is existing or not
        //echo($check[0]['list']);
        if ($check[0]['list'] != $request->list_name) {
            $playlist       = new Playlist;
            $playlist->list = $request->list_name;
            $playlist->user_id = Session('id');
            if ($playlist->save()) {
                //echo($playlist->id);
                $listDetails              = new ListDetail;
                $listDetails->poster_path = $poster_path;
                $listDetails->list_id     = $playlist->id;
                $listDetails->movie_id    = $request->movie_id;
                if ($listDetails->save()) {
                    $output['dbStatus']   = 1;
                    $output['dbMessage']  = 'New List Created';
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
        $check = ListDetail::select('movie_id')->where('list_id', $request->id)->get(); //that particular movie is existing or not
        if ($check[0]['movie_id'] != $request->movie_id) {
            $listDetails              = new ListDetail;
            $listDetails->poster_path = $request->poster_path;
            $listDetails->list_id     = $request->id;
            $listDetails->movie_id    = $request->movie_id;
            if ($listDetails->save()) {
                $output['dbStatus']   = 1;
                $output['dbMessage']  = 'New Movie Added';
            } else {
                $output['dbStatus']   = 0;
                $output['dbMessage']  = 'Some Error Occurred';
            }
        } else {
            $output['dbStatus']   = 0;
            $output['dbMessage']  = 'This movie is already in list';
        }
    }
}
