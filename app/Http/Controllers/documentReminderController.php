<?php

namespace App\Http\Controllers;

use App\Models\documentReminders;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;

class documentReminderController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [new Middleware('auth:sanctum', except: ['index', 'show'])];
    }

    public function index(Request $request)
    {
        $query = documentReminders::query();

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
        $documentReminder = documentReminders::find($id);

        if (!$documentReminder) {
            return response()->json(['message' => 'Document reminder not found'], 404);
        }

        return response()->json($documentReminder);
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|max:255',
            'expiration_date' => 'required|date',
            'reminder_date' => 'required|date',
        ]);

        $documentReminder = $request->user()->documentreminders()->create($fields);

        return $documentReminder;
    }

    public function update(Request $request,$id, documentReminders $documentReminder)
    {
        $documentReminder = documentReminders::find($id);
        if (!$documentReminder) {
            return response()->json(['message' => 'Document reminder not found'], 404);
        }
        Gate::authorize('modify', $documentReminder);
        $fields = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|max:255',
            'expiration_date' => 'required|date',
            'reminder_date' => 'required|date',
        ]);

        $documentReminder->update($fields);

        return $documentReminder;
    }

    public function destroy(documentReminders $documentReminder, $id)
    {
        $documentReminder = documentReminders::find($id);
        if (!$documentReminder) {
            return response()->json(['message' => 'Document reminder not found'], 404);
        }
        Gate::authorize('modify', $documentReminder);
        $documentReminder->delete();

        return response()->json(['message' => 'Document reminder deleted']);
    }

//     public function sendReminder()
// {
//     $today = now()->toDateString(); 
//     $reminders = documentReminders::where('reminder_date', $today)->get(); 

//     foreach ($reminders as $reminder) {
//         $message = "🔔 Pengingat Dokumen: {$reminder->name} akan kedaluwarsa pada {$reminder->expiration_date}.";
//         $this->sendWhatsAppNotification('6281354700130', $message); 
//     }

//     return response()->json(['message' => 'Notifikasi dikirim']);
// }

// private function sendWhatsAppNotification($phone, $message)
// {
//     $baseUrl = config('services.fonnte.base_url');
//     $token = config('services.fonnte.fonnte_token');

//     try {
//         $response = Http::withHeaders([
//             'Authorization' => "Bearer {$token}", 
//         ])->post("{$baseUrl}/send-message", [
//             'phone' => $phone,  
//             'message' => $message, 
//         ]);

//         if ($response->successful()) {
//             return $response->json();  
//         } else {
//             return response()->json([
//                 'error' => 'Gagal mengirim pesan',
//                 'status_code' => $response->status(),
//                 'message' => $response->body()
//             ], $response->status());
//         }
//     } catch (\Exception $e) {
//         return response()->json([
//             'error' => 'Terjadi kesalahan',
//             'message' => $e->getMessage()
//         ], 500);
//     }
// }

public function send(Request $request)
{
    $phone = $request->input('target', '0895631809241');
    $message = $request->input('message', 'test message');

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'target' => $phone,
            'message' => $message,
            'countryCode' => '62',
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: ' . env('FONNTE_TOKEN', 'Ym1nx6mH6AXQBLT9yCJ1'),
        ),
    ));

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
        curl_close($curl);
        return response()->json(['error' => $error_msg], 500);
    }

    curl_close($curl);
    return response($response, 200)
        ->header('Content-Type', 'application/json');
}


}
