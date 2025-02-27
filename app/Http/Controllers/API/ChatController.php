<?php

namespace App\Http\Controllers\Api;

use App\Models\Chat;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function startChat(Request $request , $id) {
        $order = Order::find($id)->where('status' , 'accepted')->first();

        if($order->user_id == auth()->id()) {
            $chat = Chat::firstOrCreate([
                'user_id'       => auth()->id(),
                'provider_id'   => $order->provider_id,
            ]);
        } else {
            $chat = Chat::firstOrCreate([
                'user_id'       => $order->provider_id,
                'provider_id'   => $order->user_id,
            ]);
        }
        return response()->json($chat);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}