<?php

namespace App\Http\Controllers;

use App\Models\documentreminders;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class documentReminderController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [new Middleware('auth:sanctum', except: ['index', 'show'])];
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|max:255',
            'expiration_date' => 'required|date',
            'reminder_date' => 'required|date',
        ]);

        $documentReminder = $request->user()->documentreminders()->create($fields);

        return $documentReminder;
    }

    public function update(Request $request,documentreminders $documentReminder)
    {
        Gate::authorize('modify', $documentReminder);
        $fields = $request->validate([
            'name' => 'required|max:255',
            'expiration_date' => 'required|date',
            'reminder_date' => 'required|date',
        ]);

        $documentReminder->update($fields);

        return $documentReminder;
    }

    public function destroy(documentreminders $documentReminder)
    {
        Gate::authorize('modify', $documentReminder);
        $documentReminder->delete();

        return response()->json(['message' => 'Document reminder deleted']);
    }

    public function index(Request $request)
    {
        $query = documentreminders::query();

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->get('search');
            $query->where(function($query) use ($searchTerm) {
                $query->where('name', 'like', '%'.$searchTerm.'%')
                      ->orWhere('expiration_date', 'like', '%'.$searchTerm.'%')
                      ->orWhere('reminder_date', 'like', '%'.$searchTerm.'%');
            });
        }
        $documentReminders = $query->get();
        return response()->json($documentReminders);
    }

    public function show($id)
    {
        $documentReminder = documentreminders::find($id);

        if (!$documentReminder) {
            return response()->json(['message' => 'Document reminder not found'], 404);
        }

        return response()->json($documentReminder);
    }
}
