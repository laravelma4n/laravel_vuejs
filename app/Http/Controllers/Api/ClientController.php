<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Client;
class ClientController extends Controller
{
  public function index()
  {
    $clients= Client::with('country')->get();
    return response()->json(compact('clients'));
  }
  public function store(Request $request)
  {
    //  Client::create($request->input());
    $client =new Client();
    $client->name=$request->name;
    $client->apepat=$request->apepat;
    $client->apemat=$request->apemat;
    $client->email=$request->email;
    $client->country_id=$request->country_id;
    $client->save();

  }
  public function edit($id){
    $client=Client::findOrFail($id);
    return response()->json(compact('client'));
  }
  public function update(Request $request,$id)
  {
    //  dd($request);
    $client=Client::findOrFail($id);
    $client->name=$request->name;
    $client->apepat=$request->apepat;
    $client->apemat=$request->apemat;
    $client->email=$request->email;
    $client->country_id=$request->country_id;
    $client->save();
  }
  public function destroy($id)
  {
    $client=Client::findOrFail($id);
    $client->delete();
    return response()->json(['success'=>'200']);
  }
}
