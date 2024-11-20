<?php

namespace App\Http\Controllers;

use App\Models\UsersInfo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
      $posts = UsersInfo::all();
      return view("home.index", ['posts' => $posts]);
    }

}
