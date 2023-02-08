<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Form;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $schools = School::all();
        $teachers = Teacher::all();
        $courses = Course::all();
        $forms = Form::all();

        return view('admin.index', compact('schools', 'teachers', 'courses', 'forms'));
    }

    public function logout()
    {
        Auth::logout();
        $notification = [
            'message' => 'Đăng xuất thành công.',
            'alert-type' => 'success',
        ];
        return redirect()->route('login')->with($notification);
    }
}
