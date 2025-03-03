<?php

namespace App\Http\Controllers;

use App\Models\WorkshopRating;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class WorkshopRatingController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [new Middleware('auth:sanctum', except: ['index', 'show'])];
    }

    public function index(Request $request)
    {
        $query = WorkshopRating::query();

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->get('search');
            $query->where(function ($query) use ($searchTerm) {
                $query->where('user_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('workshop_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('rating', 'like', '%' . $searchTerm . '%')
                    ->orWhere('review', 'like', '%' . $searchTerm . '%');
            });
        }
        $workshopratings = $query->get();
        return response()->json($workshopratings);
    }

    public function show($id)
    {
        $workshoprating = WorkshopRating::find($id);

        if (!$workshoprating) {
            return response()->json(['message' => 'Workshop rating not found'], 404);
        }

        return response()->json($workshoprating);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'user_id' => 'required|exists:users,id',
            'workshop_id' => 'required|exists:workshops,id',
            'rating' => 'required|numeric|between:1,5',
            'review' => 'nullable|string',
        ]);

        $workshopratings = WorkshopRating::create($fields);

        return $workshopratings;
    }
}
