<?php


namespace App\Http\Controllers;

use App\Models\ProdutoModel;
use App\Models\UsuarioModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UsuarioController extends Controller {
    public function login(Request $request) {
        if(Auth::check()){
            return redirect()->intended('main');
        }

        $rules = [
            "usuario" => "alpha_num|required|max:45",
            "senha" => "alpha_dash|required|max:255",
        ];

        $request->validate($rules);

        $usuario_cadastrado = [];
        try{
            $model = new UsuarioModel();
            $usuario_cadastrado = $model->login($request);
        }
        catch(QueryException $exception){
            $error = ['error' => 'An database connection error occurred. Please contact the system admin.'];
            return back()->withErrors($error);
        }

        $senha_inserida = $request->input('senha');

        if(Hash::check($senha_inserida, $usuario_cadastrado->senha)){
            $request->session()->regenerate();
            return redirect()->intended('main');
        }

        return back()->withErrors([
            'error' => 'Invalid user or password. Please try again.'
        ]);
    }


    public function logout(Request $request) {
        Auth::logout();
        return redirect()->intended('');
    }
}
