<?php

namespace App\Http\Controllers;

use App\Models\Workshops;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class WorkshopsController extends Controller implements HasMiddleware
{
 
    public static function middleware()
    {
        return [new Middleware('auth:sanctum', except: ['index', 'show'])];
    }

    public function index(Request $request)
    {
        $query = Workshops::query()->with('ratings');

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->get('search');
            $query->where(function($query) use ($searchTerm) {
                $query->where('name', 'like', '%'.$searchTerm.'%')
                      ->orWhere('description', 'like', '%'.$searchTerm.'%')
                      ->orWhere('address', 'like', '%'.$searchTerm.'%')
                      ->orWhere('phone_number', 'like', '%'.$searchTerm.'%');
            });
        }
        $workshops = $query->get();
        return response()->json($workshops);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'address' => 'required|max:255',
            'phone_number' => 'required|max:12',
        ]);

        $workshop = $request->user()->workshops()->create($fields);

        return $workshop;
    }

    public function show($id)
    {
        $workshop = Workshops::find($id);

        if (!$workshop) {
            return response()->json(['message' => 'Workshop not found'], 404);
        }

        return response()->json($workshop);
    }

    public function update(Request $request, Workshops $workshop)
    {
        Gate::authorize('modify', $workshop);
        $fields = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'address' => 'required|max:255',
            'phone_number' => 'required|max:12',
        ]);

        $workshop->update($fields);

        return $workshop;
    }

    public function destroy(Workshops $workshop)
    {
        // if (!auth()->check()) {
        //     return response()->json(['message' => 'Unauthenticated'], 401); // Jika user belum login
        // }

        Gate::authorize('modify', $workshop);

        $workshop->delete();

        return response()->json(['message' => 'Workshop deleted']);
    }
}
