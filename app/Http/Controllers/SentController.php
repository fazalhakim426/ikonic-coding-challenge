<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class SentController extends Controller
{


  public function index()
  {
    $page =  request()->page ?? 1;
    $sents =  Auth::user()->followings;
    $takeAmount =  request()->takeAmount ?? 10;

    return  response()->json([
      "content" => View::make(
        "components.content.sents",
        [
          "users" => $sents->take($page * $takeAmount),
          'total' => $sents->count(),
          'page' => $page
        ]
      )
        ->render()
    ]);
  }



}
