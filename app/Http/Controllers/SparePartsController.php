<?php

namespace App\Http\Controllers;

use App\Models\SpareParts;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class SparePartsController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [new Middleware('auth:sanctum', except: ['index', 'show'])];
    }

    public function index(Request $request)
    {
        $query = SpareParts::query();

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->get('search');
            $query->where(function($query) use ($searchTerm) {
                $query->where('name', 'like', '%'.$searchTerm.'%')
                      ->orWhere('description', 'like', '%'.$searchTerm.'%')
                      ->orWhere('price', 'like', '%'.$searchTerm.'%')
                      ->orWhere('stock', 'like', '%'.$searchTerm.'%');
            });
        }
        $spareParts = $query->get();
        return response()->json($spareParts);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'workshop_id' => 'required|exists:workshops,id',
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $sparePart = SpareParts::create($fields);

        return $sparePart;
    }

    public function show($id)
    {
        $sparePart = SpareParts::find($id);

        if (!$sparePart) {
            return response()->json(['message' => 'Spare part not found'], 404);
        }

        return response()->json($sparePart);
    }

    public function update(Request $request, $id)
    {
        $sparePart = SpareParts::find($id);

        if (!$sparePart) {
            return response()->json(['message' => 'Spare part not found'], 404);
        }

        $fields = $request->validate([
            'workshop_id' => 'required|exists:workshops,id',
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $sparePart->update($fields);

        return $sparePart;
    }

    public function destroy($id)
    {
        $sparePart = SpareParts::find($id);

        if (!$sparePart) {
            return response()->json(['message' => 'Spare part not found'], 404);
        }

        $sparePart->delete();

        return response()->json(['message' => 'Spare part deleted']);
    }
}
