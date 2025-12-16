<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function beranda() {
        return view('beranda');
    }

    public function caraSewa() {
        return view('cara-sewa');
    }

    public function peraturan() {
        return view('peraturan');
    }

    public function info() {
        return view('info');
    }
}
