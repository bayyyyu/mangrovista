<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    function index_404()
    {
        return view('Web.404.index');
    }
    function index_403()
    {
        return view('Web.403.index');
    }
}
