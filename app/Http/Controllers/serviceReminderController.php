<?php

namespace App\Http\Controllers;

use App\Models\serviceReminder;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class serviceReminderController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [new Middleware('auth:sanctum', except: ['index', 'show'])];
    }
    public function store(Request $request)
    {
        $fields = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'reminder_date' => 'required|date',
            'is_completed' => 'required|boolean',
        ]);

        $serviceReminder = serviceReminder::create($fields);

        return $serviceReminder;
    }

    public function update(Request $request, $id)
    {
        $serviceReminder = serviceReminder::find($id);

        if (!$serviceReminder) {
            return response()->json(['message' => 'Service reminder not found'], 404);
        }

        $fields = $request->validate([
            'user_id' => 'exists:users,id',
            'name' => 'max:255',
            'description' => 'max:255',
            'reminder_date' => 'date',
            'is_completed' => 'boolean',
        ]);

        $serviceReminder->update($fields);

        return $serviceReminder;
    }
}
