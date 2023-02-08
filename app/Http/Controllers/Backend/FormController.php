<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $forms = Form::latest()->paginate(5);
        return view('admin.forms.index', compact('forms'));
    }

    public function destroy($id)
    {
        $form = Form::find($id);
        $form->delete();
        $notification = [
            'message' => '',
            'alert-type' => 'successDelete',
        ];
        return redirect()->back()->with($notification);
    }
}
