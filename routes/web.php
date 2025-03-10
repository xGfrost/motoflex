<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('send-wa', function () {
    // $response = Http::withHeaders([
    //     'Authorization' => 'Ym1nx6mH6AXQBLT9yCJ1', // API Key or Token for Authorization
    // ])->post('https://api.fonte.com/send', [ // API URL for sending the message
    //     'target' => '081354700130', // Phone number to send the message
    //     'message' => 'Ini Pesan Laravel', // Message content
    // ]);

    // dd($response->json());

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
            'target' => '081354700130',
            'message' => 'test message',
            'countryCode' => '62', //optional
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Ym1nx6mH6AXQBLT9yCJ1' //change TOKEN to your actual token
        ),
    ));

    $response = curl_exec($curl);
    if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
    }
    curl_close($curl);

    if (isset($error_msg)) {
        echo $error_msg;
    }

    return $response;
});
