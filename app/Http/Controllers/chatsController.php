<?php

namespace App\Http\Controllers;

use App\Models\chats;
use App\Models\chatMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class chatsController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); 
        
        $chats = chats::with('workshop', 'user') 
                      ->where('user_id', $userId) 
                      ->get();

        return response()->json($chats); 
    }

    public function show($chatId)
    {
        $messages = chatMessages::with('sender') 
                                ->where('chat_id', $chatId)
                                ->orderBy('sent_at', 'asc') 
                                ->get();

        return response()->json($messages); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'workshop_id' => 'required|exists:workshops,id', 
        ]);

        $chat = chats::create([
            'user_id' => Auth::id(), 
            'workshop_id' => $request->workshop_id, 
        ]);

        return response()->json($chat, 201); 
    }

    public function sendMessage(Request $request, $chatId)
    {
        $request->validate([
            'message' => 'required|string', 
        ]);

        $message = chatMessages::create([
            'chat_id' => $chatId,
            'sender_id' => Auth::id(), 
            'message' => $request->message,
            'sent_at' => now(), 
        ]);

        return response()->json($message, 201); 
    }

    public function destroy($chatId)
    {
        $chat = chats::findOrFail($chatId);
        
        $chat->chatMessages()->delete();
        
        $chat->delete();

        return response()->json(null, 204); 
    }
}
