<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class PageContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('pages.contact', compact('categories'));
    }

    public function store(Request $request)
    {
        Contact::create($request->all());

        $notification = [
            'title' => 'Gửi thành công.',
            'text' => 'Chúng tôi sẽ sớm liên hệ cho bạn! Cảm ơn bạn đã liên hệ!',
            'alert-type' => 'success',
        ];
        return redirect()->route('home')->with($notification);
    }
}
