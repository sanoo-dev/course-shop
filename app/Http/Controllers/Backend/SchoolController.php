<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShoolRequest;
use App\Http\Requests\UpdateShoolRequest;
use App\Models\School;

class SchoolController extends Controller
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
        $schools = School::latest()->paginate(3);
        return view('admin.schools.index', compact('schools'));
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
    public function store(StoreShoolRequest $request)
    {
        $school = new School();
        $school->name = $request->name;
        $school->address = $request->address;
        $school->save();

        $notification = [
            'message' => 'Thêm trường/trung tâm thành công.',
            'alert-type' => 'success',
        ];
        return redirect()->back()->with($notification);
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
        $school = School::find($id);

        return view('admin.schools.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShoolRequest $request, $id)
    {
        $school = School::find($id);
        $school->name = $request->name;
        $school->address = $request->address;
        $school->save();

        $notification = [
            'message' => 'Cập nhật trường/trung tâm thành công.',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.schools.show')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school = School::find($id);
        if (count($school->teachers) == 0) {
            $school->delete();

            $notification = [
                'message' => '',
                'alert-type' => 'successDelete',
            ];
            return redirect()->back()->with($notification);
        } else {
            $notification = [
                'message' => 'Có giảng viên trong trường/trung tâm này! Vui lòng kiểm tra lại.',
                'alert-type' => 'errorDelete',
            ];

            return redirect()->back()->with($notification);
        }
    }
}
