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
        return view('menu', compact('rotaBase', 'nomeBase'));
    }

    public function formUpdate()
    {
        return view("{$this->parametroRotaBase}.update");
    }

    public function formDelete()
    {
        return view("{$this->parametroRotaBase}.delete");
    }
}