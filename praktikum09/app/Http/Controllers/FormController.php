<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    //bikin fungsi untuk menampilkan view form 
    public function index(){
        return view('form');
    }

    public function hasil(Request $request){
        $this->validate($request,[
            'nama' => 'required',
            'ttl' => 'required',
            'jenis_kelamin' => 'required',
            'hobi' => 'required',
            

        ]);///cek inputam
        return view('hasil',['data' => $request]);
    }
}
