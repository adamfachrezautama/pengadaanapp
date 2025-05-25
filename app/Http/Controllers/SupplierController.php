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
use App\Models\Supplier;

use \Illuminate\Foundation\Validation\ValidatesRequests;


class SupplierController extends Controller
{
    use \Illuminate\Foundation\Validation\ValidatesRequests;
    //

    public function index()
    {

         $key = env('APP_KEY');

            if (Session::has('token')) {
            $token = Session::get('token');
            $tokenDB = Supplier::where('token', $token)->count();

            $this->data['token'] = $tokenDB > 0 ? $token : null;
            } else {
                $this->data['token'] = null;
            }
        return view('supplier.login', $this->data);

    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);


        $cek = Supplier::where('email', $request->email)->count();
        $sup = Supplier::where('email', $request->email)->get();

        if($cek > 0){
            foreach($sup as $s){
                if(decrypt($s->password) == $request->password){
                    $key = env('APP_KEY');
                    $data = array(
                        'id' => $s->id,
                        'email' => $s->email,
                        'name' => $s->name,
                        'role' => $s->role
                    );
                    $jwt = JWT::encode($data, $key, 'HS256');

                    Supplier::where('id', $s->id)->update([
                        'token' => $jwt,
                    ]);

                    Session::put('token', $jwt);
                    return redirect('/');
                }
            }
        }else{
            return redirect('/login')->with('gagal', 'Email atau password salah');
        }

    }

    public function logout()
    {
        $token = Session::get('token');
        $sup = Supplier::where('token', $token)->get();

        foreach($sup as $s){
            Supplier::where('id', $s->id)->update([
                'token' => null,
            ]);
        }

        Session::forget('token');
        return redirect('/');
    }
}
