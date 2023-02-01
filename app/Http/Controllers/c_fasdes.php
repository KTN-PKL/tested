<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fasdes;
use App\Models\poktan;

class c_fasdes extends Controller
{
    public function __construct()
    {
        $this->poktan = new poktan();
        $this->fasdes = new fasdes();
    }
    public function index()
    {
        $data = ['fasdes' => $this->fasdes->allData,];
    }
}
