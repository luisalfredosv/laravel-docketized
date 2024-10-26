<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessWebhookJob;
use Illuminate\Http\Request;

class ApiWebhookController extends Controller
{
    public function handle(Request $request)
    {
        ProcessWebhookJob::dispatch();
        return response()->json(['success' => true]);
    }
}
