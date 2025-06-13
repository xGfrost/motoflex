<?php

namespace App\Http\Controllers;

use App\Models\Workshops;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $workshops = Workshops::query()->withAvg('ratings', 'rating')->get();
        $data = [
            'user' => $user,
            'workshops' => $workshops
        ];
        return response()->json([
            'data' => $data,
            'status' => 'success'
        ], 200);
    }
}
