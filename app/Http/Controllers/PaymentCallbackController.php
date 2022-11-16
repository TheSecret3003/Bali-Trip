<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\Midtrans\CallbackService;

class PaymentCallbackController extends Controller
{
    public function receive()
    {
        $callback = new CallbackService;

        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $order = $callback->getOrder();

            if ($callback->isSuccess()) {
                Order::where('id', $order->id)->update([
                    'status' => 'success',
                ]);
            }

            if ($callback->isExpire()) {
                Order::where('id', $order->id)->update([
                    'status' => 'timeout',
                ]);
            }

            if ($callback->isCancelled()) {
                Order::where('id', $order->id)->update([
                    'status' => 'canceled',
                ]);
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notification successfully processed',
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key not verified',
                ], 403);
        }
    }
}