<?php

use Zttp\Zttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('ticker', function (Request $request) {
    $data = Cache::remember('blockchain-exchange-rates::ticker', 10, function () {
        $response = Zttp::get('https://blockchain.info/ticker');

        return $response->json();
    });

    return response()->json($data);
});
