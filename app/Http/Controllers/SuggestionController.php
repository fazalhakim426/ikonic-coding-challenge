<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConnectRequest;
use App\Models\Follow;
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

    public function store(ConnectRequest $request)
    {
        Follow::create($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Request sent successfully',

        ]);
    }
}
