<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Pusher;

class ChatController extends Controller
{

  public function postMessage(Request $request)
  { 
      $options = array(
          'cluster' => 'ap1'
        );
        $pusher = new Pusher(
          '280081bfca7e082907af',
          '4b483933fae76780ff2a',
          '321587',
          $options
        );
        $data['message'] = $request->input('message');
        $data['self'] = $request->input('self');
        $pusher->trigger($request->input('channel'), 'addMessage', $data);
  }
  public function registerToAdmin(Request $request)
  { 
      $options = array(
          'cluster' => 'ap1'
        );
        $pusher = new Pusher(
          '280081bfca7e082907af',
          '4b483933fae76780ff2a',
          '321587',
          $options
        );
        $data['channel'] = $request->input('channel');
        $pusher->trigger('adminChannel', 'add', $data);
  }
  public function chat($userId){

  }
}