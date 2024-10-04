<?php

//Aqui vamos  acrear la vista para el home, la cual llamara  alos componetes
namespace App\Http\Controllers;


use Illuminate\Http\Request;

//Nombre de la clase
class HomeController extends Controller
{
     //CReamos la fucnion
     public function index()
     {
        return view('home');
     }
}
