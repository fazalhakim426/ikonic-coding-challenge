<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ConnectionInCommonController extends Controller
{

  public function index(User $user)
  {
    $commonPage =  request()->commonPage ?? 1;
    $takeAmount =  request()->takeAmount ?? 10; 
    $userConnections = $user->connections->whereIn('id', Auth::user()->connections->pluck('id')->toArray());
    return  response()->json([
      "content" => View::make(
        "components.content.connections_in_common",
        [
          "commonUsers" =>   $userConnections->take($commonPage * $takeAmount),
          'commonTotal' => $userConnections->count(),
          'commonPage' => $commonPage,
          'commonUser' => $user
        ]
      )
        ->render()
    ]);
  }
}
