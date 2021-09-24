<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

interface ControllerInterface
{
    public function form(Request $request);
    public function create(Request $request);
    public function update(Request $request);
    public function list(Request $request);
    public function delete(Request $request);
}