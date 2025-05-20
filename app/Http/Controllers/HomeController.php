<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Firebase\JWT\JWT;
use App\Models\Supplier;

class HomeController extends Controller
{

    public function index(){
          $key = env('APP_KEY');

            if (Session::has('token')) {
            $token = Session::get('token');
            $tokenDB = Supplier::where('token', $token)->count();

            $this->data['token'] = $tokenDB > 0 ? $token : null;
            } else {
                $this->data['token'] = null;
            }
        return view('home.index', $this->data);
    }
}
