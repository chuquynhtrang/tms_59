<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Http\Requests\CourseRequest;
use App\Models\Subject;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();

        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $course = new Course();
        $requestAll = $request->all();
        $course->create($requestAll);

        return redirect()->action('Admin\CourseController@index')->withSuccess(trans('session.course_create_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect()->action('Admin\CourseController@index')
                ->withErrors(['message' => trans('course.not_found')]);
        }

        return view('admin.course.show', compact('course'));
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

        if (!$course) {
            return redirect()->action('Admin\CourseController@index')
                ->withErrors(['message' => trans('course.not_found')]);
        }

        return view('admin.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $course = Course::find($id);

        if (!$course) {
            return redirect()->action('Admin\CourseController@index')
                ->withErrors(['message' => trans('course.not_found')]);
        }

        $requestAll = $request->all();
        $course->update($requestAll);

        return redirect()->action('Admin\CourseController@index')->withSuccess(trans('session.course_update_success'));
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

        if (!$course) {
            return redirect()->action('Admin\CourseController@index')
                ->withErrors(['message' => trans('course.not_found')]);
        }

        $course->delete();

        return redirect()->action('Admin\CourseController@index')->withSuccess(trans('session.course_delete_success'));
    }

    /**
    * View details course
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function viewSubject($id)
    {
        $course = Course::with('subjects')->find($id);

        if (!$course) {
            return redirect()->action('Admin\CourseController@index')
                ->withErrors(['message' => trans('course.not_found')]);
        }

        return view('admin.course.viewSubject', compact('course'));
    }
}
