<?php

namespace App\Http\Controllers;

use App\Models\ListDetail;
use App\Models\Playlist;
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
        $output = array('dbStatus' => '','dbMessage'=>'');
        $playlist       = new Playlist;
        $playlist->list = $request->list_name;
        if($playlist->save())
        {
            $output['dbStatus']   = 1;
            $output['dbMessage']  = 'New List Created';
        }else{
            $output['dbStatus']   = 0;
            $output['dbMessage']  = 'Some Error Occurred.';
        }
        return response()->json($output);
    }

    public function list_creation_page()
    {
        return view('CreateNewList');
    }
}
