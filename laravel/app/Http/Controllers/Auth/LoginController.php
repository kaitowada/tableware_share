<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Psy\Util\Json;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request) {
        return 'hoge';
    }
}
