<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contacts = Contact::latest()->paginate(5);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        $notification = [
            'message' => '',
            'alert-type' => 'successDelete',
        ];
        return redirect()->back()->with($notification);
    }
}
