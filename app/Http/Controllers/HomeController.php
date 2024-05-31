<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function mostrarMensagem($mensagem) {
        $nome = "Gabriel";
        return view("mensagem", compact('mensagem', 'nome'));
    }
}
