<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacherRequest;
use App\Models\School;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
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
        $teacher = new Teacher();
        if (!$teacher->checkHaveSchool()) {
            $notification = [
                'message' => 'Chưa có trường/trung tâm! Vui lòng thêm trường/trung tâm trước.',
                'alert-type' => 'warning',
            ];
            return redirect()->route('admin.schools.show')->with($notification);
        }

        $schools = School::all();
        $teachers = $teacher->latest()
            ->paginate(3);
        return view('admin.teachers.index', compact('teachers', 'schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTeacherRequest $request)
    {
        $teacher = new Teacher();
        $teacher->create($request->all());

        $notification = [
            'message' => 'Thêm giảng viên thành công.',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $schools = School::all();

        return view('admin.teachers.edit', compact('teacher', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        $teacher->update($request->all());

        $notification = [
            'message' => 'Cập nhật giảng viên thành công.',
            'alert-type' => 'success',
        ];
        return redirect()->route('admin.teachers.show')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        if (count($teacher->courses) == 0) {
            $teacher->delete();

            $notification = [
                'message' => '',
                'alert-type' => 'successDelete',
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'message' => 'Có khoá học thuộc giảng viên này! Vui lòng kiểm tra lại.',
                'alert-type' => 'errorDelete',
            ];

            return redirect()->back()->with($notification);
        }
    }
}
