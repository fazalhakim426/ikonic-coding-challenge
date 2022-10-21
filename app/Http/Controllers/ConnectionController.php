<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConnectRequest;
use App\Http\Resources\ConnectionResource;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ConnectionController extends Controller
{



  public function index()
  {
    $page =  request()->page ?? 1;
    $takeAmount =  request()->takeAmount ?? 10;
    $connections =  Auth::user()->connections;
    return  response()->json([
      "content" => View::make(
        "components.content.connections",
        [
          "users" => $connections->take($page * $takeAmount),
          'total' => $connections->count(),
          'page' => $page
        ]
      )->render()
    ]);
  } 
  
  public function store(ConnectRequest $request)
  {
    Follow::create($request->validated());
    return response()->json([
      'success' => true,
      'message' => 'Request sent successfully',

    ]);
  }

  public function destroy(Follow $follow)
  {
    $follow->delete();
    return response()->json([
      "success" => true,
      "message" => "request cancelled!"
    ]);
  }
}
