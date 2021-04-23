<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ViewsController {
    public function index(Request $request) {
        return view('index');
    }


    public function main(Request $request) {
        return view('main');
    }
}
