<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = new Course();
        if (!$course->checkHaveCategory()) {
            $notification = [
                'message' => 'Chưa có danh mục! Vui lòng thêm danh mục trước.',
                'alert-type' => 'warning',
            ];
            return redirect()->route('admin.caterogies.show')->with($notification);
        } else if (!$course->checkHaveTeacher()) {
            $notification = [
                'message' => 'Chưa có giảng viên! Vui lòng thêm giảng viên trước.',
                'alert-type' => 'warning',
            ];
            return redirect()->route('admin.teachers.show')->with($notification);
        }

        $courses = $course->latest()
            ->paginate(3);
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $teachers = Teacher::all();
        return view('admin.courses.create', compact('categories', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        $course = new Course();
        $course->image = $this->handleUploadImage($request->file('image'));
        $course->name = $request->name;
        $course->desc = $request->desc;
        $course->price = $request->price;
        $course->category_id = $request->category_id;
        $course->teacher_id = $request->teacher_id;
        $course->status = $request->status;
        $course->save();

        $notification = [
            'message' => 'Thêm khoá học thành công.',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.courses.show')->with($notification);
    }

    public function updateStatus(Request $request, $id)
    {
        $course = Course::find($id);
        $course->status = $course->status == '1' ? 0 : 1;
        $course->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $categories = Category::all();
        $teachers = Teacher::all();
        return view('admin.courses.edit', compact('course', 'categories', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, $id)
    {
        $course = Course::find($id);

        $oldImage = $request->oldImage;
        if ($request->file('image')) {
            $course->image = $this->handleUploadImage($request->image);
            unlink($oldImage);
        }

        $course->name = $request->name;
        $course->desc = $request->desc;
        $course->price = $request->price;
        $course->teacher_id = $request->teacher_id;
        $course->category_id = $request->category_id;
        $course->save();

        $notification = [
            'message' => 'Cập nhật khoá học thành công.',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.courses.show')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        if (count($course->forms) == 0) {
            if (file_exists($course->image)) {
                unlink($course->image);
            }
            $course->delete();

            $notification = [
                'message' => 'Xoá khoá học thành công.',
                'alert-type' => 'successDelete',
            ];

            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'message' => 'Có học viên đăng ký khoá học này! Vui lòng kiểm tra lại.',
                'alert-type' => 'errorDelete',
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function handleUploadImage($image)
    {
        if (!is_null($image)) {
            $image_name = time() . '_' . $image->getClientOriginalName();
            $image->move('images/course', $image_name);
            return 'images/course' . '/' . $image_name;
        }
    }
}
