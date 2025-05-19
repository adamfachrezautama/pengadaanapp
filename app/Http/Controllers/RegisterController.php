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

        $supplier = new Supplier();
        $supplier->nama_usaha = $request->input('nama_usaha');
        $supplier->email = $request->input('email');
        $supplier->alamat = $request->input('alamat');
        $supplier->no_npwp = $request->input('no_npwp');
        $supplier->save();

        return response()->json(['message' => 'Supplier registered successfully'], 201);

    }
}
