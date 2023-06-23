<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Null_;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::latest()->get();
        $categories = Category::whereNull('category_id')->take(4)->get();
        $slides = Slide::latest()->get();

        return view('frontend.homepage', compact('products', 'categories','slides'));
    }

    public function contact()
    {
        $data = [];

        return view('frontend.contact', $data);
    }

    public function company()
    {
        $data = [];

        return view('frontend.companyprofile', $data);
    }

    public function submitContactForm(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'message' => 'required',
    ]);

    Contact::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'message' => $request->message,
    ]);

    // Set notifikasi flash
    Session::flash('success', 'Terima kasih telah menghubungi kami. Kami akan segera merespon pertanyaan Anda.');

    return redirect()->back();
}
}
