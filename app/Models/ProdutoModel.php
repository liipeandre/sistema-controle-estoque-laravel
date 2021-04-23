<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProdutoModel {
    public function insert(Request $request) {
        return DB::table('produtos')
            ->insert($request->except('_token'));
    }


    public function delete(Request $request) {
        return DB::table('produtos')
            ->where('idproduto', $request->get('idproduto'))
            ->delete();
    }


    public function list() {
        return DB::table('produtos')
            ->select('idproduto', 'nome', 'quantidade', 'categoria')
            ->from('produtos')->get();
    }


    public function view(Request $request) {
        return DB::table('produtos')
            ->select('idproduto', 'nome', 'quantidade', 'categoria')
            ->where('idproduto', $request->input('idproduto'))
            ->first();
    }


    public function edit(Request $request) {
        return DB::table('produtos')
            ->where('idproduto', $request->get('idproduto'))
            ->update($request->except('_token', 'idproduto'));
    }
}
