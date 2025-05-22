<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


// library for JWT
use Firebase\JWT\JWT;

// library response
use Illuminate\Http\Response;

// library validation
use Illuminate\Support\Facades\Validator;

// libary encryption
use Illuminate\Contracts\Encryption\DecryptException;

// library session
use Illuminate\Support\Facades\Session;

// model
use App\Models\Admin;


class AdminController extends Controller
{
    //

    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email'=> 'required|email',
            'password'=>'required',
        ]);

        $cek = Admin::where('email', $request->email)->count();
        $admin = Admin::where('email', $request->email)->get();

        if($cek > 0){
            foreach($admin as $adm){
                if(decrypt($adm->password) == $request->password){
                    $key = env('APP_KEY');
                    $data = [
                        'id' => $adm->id,
                    ];
                    $jwt = JWT::encode($data,$key, 'HS256');

                    Admin::where('id', $adm->id)->update([
                        'token' => $jwt,
                    ]);

                    Session::put('token', $jwt);
                    return redirect()->route('/admin');
                }
            }
        }
    }
}
