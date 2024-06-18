<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadDataPenanamanController extends Controller
{
    function index(){
        return view('Web.Profil.Upload.index');
    }
    function store(){
        return view('Web.Profil.Upload.store');
    }
}
