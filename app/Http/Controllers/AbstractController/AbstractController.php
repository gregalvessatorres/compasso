<?php

namespace App\Http\Controllers\AbstractController;

use App\Http\Controllers\Controller;

class AbstractController extends Controller
{
    protected $parametroRotaBase;
    protected $parametroNomeBase;
    public function index()
    {
        $rotaBase = $this->parametroRotaBase;
        $nomeBase = $this->parametroNomeBase;
        return view('base.menu', compact('rotaBase', 'nomeBase'));
    }

    public function formUpdate()
    {
        $rotaBase = $this->parametroRotaBase;
        $nomeBase = $this->parametroNomeBase;
        return view("base.update", compact('rotaBase', 'nomeBase'));
    }

    public function formDelete()
    {
        $rotaBase = $this->parametroRotaBase;
        $nomeBase = $this->parametroNomeBase;
        return view("base.delete", compact('rotaBase', 'nomeBase'));
    }
}