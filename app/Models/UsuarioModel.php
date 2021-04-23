<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UsuarioModel {
    public function login(Request $request){
        return DB::table('usuarios')
            ->select('senha')
            ->where('usuario', $request->input('usuario'))
            ->first();
    }
}
