<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Client;
class ClientController extends Controller
{
    public function index(){
      return view('client.index');
    }
}
