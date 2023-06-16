<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Subscriber;
class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email|unique:subscribers',
        ]);

        // Simpan data langganan
        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        // Kirim respon berhasil
        return redirect()->back()->with('success', 'You have subscribed to our newsletter.');
    }
}
