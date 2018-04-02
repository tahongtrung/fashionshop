<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Twilio;

class SMSController extends Controller
{
    public function sendSMS(){
    	Twilio::message("01219187548", "tested");
    }
}
