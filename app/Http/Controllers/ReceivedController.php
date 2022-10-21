<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ReceivedController extends Controller
{


  public function index()
  {
    $page =  request()->page ?? 1;
    $takeAmount =  request()->takeAmount ?? 10;

    $receiveds = Auth::user()->followers()->where('approved', 0)->get();
    return  response()->json([
      "content" => View::make(
        "components.content.receiveds",
        [
          "users" => $receiveds->take($page * $takeAmount),
          'total' => $receiveds->count(),
          'page' => $page
        ]
      )
        ->render()
    ]);
  }


  public function store(Follow $follow)
  {

    $follow->approved = true;
    if ($follow->save()) {
      return response()->json([
        'success' => true,
        'message' => 'approved successfully'
      ]);
    }
  }
}
