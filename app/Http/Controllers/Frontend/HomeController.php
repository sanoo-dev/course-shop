<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\Form;

class HomeController extends Controller
{
    public function index()
    {
        $forms = Form::all();
        $course = new Course();

        $categories = Category::all();
        $courses = $course->getAvailableCourses(6);

        $fullCourse = $course->all();

        return view('pages.index', compact('courses', 'categories', 'forms', 'fullCourse'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $value = $request->name;
        $fullSearch = Course::where('name', 'LIKE', "%$value%")->get();
        $courses = Course::where('name', 'LIKE', "%$value%")->paginate(6);

        $header = 'Tìm được ' . count($fullSearch) . ' kết quả.';

        return view('pages.courses', compact('courses', 'categories', 'header'));
    }
}
