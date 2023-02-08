<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use App\Models\Form;
use App\Http\Requests\StoreRegisterRequest;

class PageCourseController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $course = new Course();
        $courses = $course->getAvailableCourses(6);
        $header = 'Tất cả khoá học';
        return view('pages.courses', compact('courses', 'categories', 'header'));
    }

    public function detail($id)
    {
        $course = Course::find($id);
        $categories = Category::all()->where('status', 1);
        return view('pages.course-detail', compact('categories', 'course'));
    }

    public function register($id)
    {
        $course = Course::find($id);
        $categories = Category::all();
        return view('pages.course-register', compact('categories', 'course'));
    }

    public function storeRegister(StoreRegisterRequest $request)
    {
        $form = new Form();
        $form->create($request->all());

        $notification = [
            'title' => 'Đăng ký thành công.',
            'text' => 'Trường/trung tâm sẽ sớm liên hệ cho bạn! Cảm ơn bạn đã đăng ký!',
            'alert-type' => 'success',
        ];
        return redirect()->route('home')->with($notification);
    }
}
