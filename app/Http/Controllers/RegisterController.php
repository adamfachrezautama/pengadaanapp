<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;


class RegisterController extends Controller
{
    //
    public function index(){
        return view('register.index');
    }


    public function register(Request $request){
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'email' => 'required|email|unique:suppliers,email',
            'alamat' => 'required|string|max:255',
            'no_npwp' => 'required|string|max:255',
        ]);

        if(
            Supplier::create(
                [
                    'nama_usaha' => $request->nama_usaha,
                    'email' => $request->email,
                    'alamat' => $request->alamat,
                    'no_npwp' => $request->no_npwp,
                    'password' => encrypt($request->password)
                ]
            )
        ){
            return redirect('/register')->with('berhasil','Data berhasil disimpan');
        }else{
            return redirect('/register')->with('gagal','Data gagal disimpan');
        }
    }
}
