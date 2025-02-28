<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class ServicesController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [new Middleware('auth:sanctum', except: ['index', 'show'])];
    }

    public function index(Request $request)
    {
        $query = Services::query();

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->get('search');
            $query->where(function($query) use ($searchTerm) {
                $query->where('name', 'like', '%'.$searchTerm.'%')
                      ->orWhere('description', 'like', '%'.$searchTerm.'%')
                      ->orWhere('price', 'like', '%'.$searchTerm.'%')
                      ->orWhere('duration', 'like', '%'.$searchTerm.'%');
            });
        }
        $services = $query->get();
        return response()->json($services);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'workshop_id' => 'required|exists:workshops,id',
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'duration' => 'required|numeric',
        ]);

        $service = Services::create($fields);

        return $service;
    }

    public function show($id)
    {
        $service = Services::find($id);

        if (!$service) {
            return response()->json(['message' => 'Service not found'], 404);
        }

        return response()->json($service);
    }

    public function update(Request $request, Services $service)
    {
        // Gate::authorize('modify', $service);

        $fields = $request->validate([
            'workshop_id' => 'required|exists:workshops,id',
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'duration' => 'required|numeric',
        ]);
        $service->update($fields);

        return $service;
    }

    public function destroy(Services $service)
    {
        // Gate::authorize('modify', $service);
        $service->delete();
        return response()->json(['message' => 'Service deleted']);
    }
}
