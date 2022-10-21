<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class SuggestionController extends Controller
{

    public function index()
    {
        $page =  request()->page ?? 1;
        $takeAmount =  request()->takeAmount ?? 10; 
        $suggestions =  Auth::user()->suggestions;

        return  response()->json([
            "content" => View::make(
                "components.content.suggestions",
                [
                    "users" => $suggestions->take($page * $takeAmount),
                    'total' => $suggestions->count(),
                    'page' => $page
                ]
            )->render()
        ]);
    }
}
