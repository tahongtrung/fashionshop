<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    protected function validator(array $data)
    {
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:3',
        ];

        $messages = [
            'email.email'  =>'Email không đúng định dạng!',
            'required'=> 'Vui lòng không để trống trường này!'
        ];

        return Validator::make($data,$rules,$messages);
    }
}
