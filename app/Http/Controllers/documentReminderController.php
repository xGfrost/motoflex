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

    public function sendReminder()
{
    $today = now()->toDateString(); // Mendapatkan tanggal hari ini
    $reminders = documentReminders::where('reminder_date', $today)->get(); // Mendapatkan pengingat yang jatuh pada hari ini

    foreach ($reminders as $reminder) {
        // Membuat pesan pengingat
        $message = "🔔 Pengingat Dokumen: {$reminder->name} akan kedaluwarsa pada {$reminder->expiration_date}.";
        $this->sendWhatsAppNotification('6281354700130', $message); // Ganti dengan nomor dinamis
    }

    return response()->json(['message' => 'Notifikasi dikirim']);
}

private function sendWhatsAppNotification($phone, $message)
{
    // Ambil API base URL dan token dari config
    $baseUrl = config('services.fonnte.base_url');
    $token = config('services.fonnte.fonnte_token');

    try {
        // Mengirim request ke API Fonnte untuk mengirim pesan WhatsApp
        $response = Http::withHeaders([
            'Authorization' => "Bearer {$token}", // Menambahkan token Bearer di header
        ])->post("{$baseUrl}/send-message", [
            'phone' => $phone,  // Nomor penerima
            'message' => $message, // Isi pesan
        ]);

        // Memeriksa jika request berhasil
        if ($response->successful()) {
            return $response->json();  // Mengembalikan response dalam format JSON
        } else {
            // Jika gagal, kirim pesan error
            return response()->json([
                'error' => 'Gagal mengirim pesan',
                'status_code' => $response->status(),
                'message' => $response->body()
            ], $response->status());
        }
    } catch (\Exception $e) {
        // Menangani error jika terjadi pengecualian
        return response()->json([
            'error' => 'Terjadi kesalahan',
            'message' => $e->getMessage()
        ], 500);
    }
}



}
