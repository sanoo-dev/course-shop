<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;

class PageCategoryController extends Controller
{
    public function index($id)
    {
        $categories = Category::all();
        $category = Category::find($id);

        // dd($category);
        $course = new Course();
        $courses = $course->getAvailableCoursesByCategory($id);
        return view('pages.categories', compact('courses', 'category', 'categories'));
    }
}
