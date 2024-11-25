<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
      $posts = User::all();
      return view("home.index", ['posts' => $posts]);
    }

}
