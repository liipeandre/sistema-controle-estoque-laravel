<?php


namespace App\Http\Controllers;

use App\Models\ProdutoModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;


class ProdutoController {

    private $messages = [
        'idproduto.*' => '"idproduto" field is invalid',
        'nome.*' => '"nome" field is invalid',
        'quantidade.*' => '"quantidade" field is invalid',
        'categoria.*' => '"categoria" field is invalid',
    ];

    public function insert(Request $request) {
        if($request->isMethod('GET')){
            return view('produtos.insert');
        }

        $rules = [
            "nome" => "alpha_num|required|max:45",
            "quantidade" => "integer|required",
            "categoria" => "alpha|required|max:45",
        ];

        $request->validate($rules, $this->messages);

        try{
            $model = new ProdutoModel();
            $model->insert($request);
        }
        catch(QueryException $exception){
            $error = ["error" => "An error ocurred. Please verify the fields and try again",];
            return view('produtos.insert')->withErrors($error);
        }

        $error = ['status' => 'Action executed successful.'];
        return view('produtos.insert')->withErrors($error);
    }


    public function delete(Request $request) {
        $rules = [
            "idproduto" => "integer|required",
        ];

        $request->validate($rules, $this->messages);

        $model = new ProdutoModel();
        $data = $model->list();

        try{
            $model->delete($request);
        }
        catch(QueryException $exception){
            $data = $model->list();
            $error = ["error" => "An error ocurred. Please verify the fields and try again",];
            return view('produtos.list')->withErrors($error)->with('data', $data);
        }

        return view('produtos.list')->with('data', $data);
    }


    public function list() {
        $model = new ProdutoModel();
        $data = $model->list();
        return view('produtos.list')->with('data', $data);
    }


    public function view(Request $request){
        $rules = [
            "idproduto" => "integer|required",
        ];

        $request->validate($rules, $this->messages);

        $registry = [];
        try{
            $model = new ProdutoModel();
            $registry = $model->view($request);
        }
        catch(QueryException $exception){
            $error = ["error" => "An error ocurred. Please verify the fields and try again",];
            return view('produtos.list')->withErrors($error);
        }
        return view('produtos.edit')->with('registry', $registry);
    }


    public function edit(Request $request) {
        $rules = [
            "idproduto" => "integer|required",
            "nome" => "alpha_num|required|max:45",
            "quantidade" => "integer|required",
            "categoria" => "alpha|required|max:45",
        ];

        $request->validate($rules, $this->messages);

        $registry = [];
        try{
            $model = new ProdutoModel();
            $model->edit($request);
            $registry = $model->view($request);
        }
        catch(QueryException $exception){
            $error = ["error" => "An error ocurred. Please verify the fields and try again",];
            return view('produtos.edit')->withErrors($error);
        }

        $error = ['status' => 'Action executed successful.'];
        return view('produtos.edit')->withErrors($error)->with('registry', $registry);
    }
}
