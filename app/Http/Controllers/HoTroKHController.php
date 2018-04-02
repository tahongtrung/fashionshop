<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\TuyendungAddRequest;
use App\Http\Requests\TuyendungEditRequest;
use App\Tuyendung;

use DB;
use Input,File;

class HoTroKHController extends Controller
{
    public function getList()
    {
        return view('backend.hotrokh.list');
    }

    public function chat($userId)
    {
        $channel = $userId;
        return view('backend.hotrokh.chat',compact('channel'));
    }

    public function postAdd(TuyendungAddRequest $request)
    {
        
    }

    public function getDelete($id)
    {
       
    }

    public function getEdit($id)
    {
    	
    }

    public function postEdit(TuyendungEditRequest $request, $id)
    {
    	
    }
}
