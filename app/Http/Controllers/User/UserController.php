<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Report;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\EditProfileRequest;
use App\Models\UserCourse;
use App\Models\UserSubject;
use App\Models\Course;
use App\Models\Subject;

class UserController extends Controller
{

    /**
     * Get List User
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * View Detail User
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->action('User\UserController@index')
                ->withErrors(['message' => trans('user.not_found')]);
        }

        return view('user.details', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->action('User\UserController@index')
                ->withErrors(['message' => trans('user.not_found')]);
        }

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProfileRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = sha1(time()) . '-' . $avatar->getClientOriginalName();
            $request->file('avatar')->move(base_path() . config('user.avatar_folder'), $filename);
            $user->avatar = $filename;
        }

        $user->name = $request->name;
        $user->information = $request->information;
        $requestAll = $request->all();
        $user->save($requestAll);

        return redirect('home')->withSuccess(trans('session.user_update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Call come form view Report
     */
    public function report()
    {
        return view('user.report');
    }

    /**
     * Create Report
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeReport(StoreReportRequest $request, $id)
    {
        $report = new Report();

        $report->user_id = $id;
        $report->achivement = $request->achivement;
        $report->next_plan = $request->next_plan;
        $report->problem = $request->problem;
        $requestAll = $request->all();
        $report->save($requestAll);

        return redirect()->action('User\UserController@index')->withSuccess(trans('session.user_create_report'));
    }

    /**
     * View History Course for User
     *
     * @param  int  $id
     * @return \Illuminatue\Http\Response
     */
    public function historyCourse($id)
    {
        $user = User::with('userSubjects', 'userSubjects.subject', 'userCourses', 'userCourses.course')->find($id);

        return view('user.historyCourse', compact('user'));
    }

    /**
     * View Course of User
     *
     * @return \Illuminate\Http\Response
     */
    public function viewCourse($id)
    {
        $user = User::with('courses')->find($id);

        return view('user.viewCourse', compact('user', 'id'));
    }

    /**
     * View Course Details of User
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function viewCourseInstructions($id, $course_id)
    {
        $userCourse = UserCourse::where('user_id', $id)->where('course_id', $course_id)->get();
        $course = Course::with('subjects.userSubject')->find($course_id);

        return view('user.viewCourseInstructions', compact('course', 'id', 'course_id', 'userCourse'));
    }

    public function viewSubjectInstructions($id, $course_id, $subject_id)
    {
        $userSubject = UserSubject::where('user_id', $id)->where('subject_id', $subject_id)->get();
        $subject = Subject::with('tasks.userTask')->find($subject_id);

        return view('user.viewSubjectInstructions', compact('id', 'course_id', 'subject_id', 'userSubject', 'subject'));
    }

    public function viewMembers($course_id)
    {
        $course = Course:: with('users')->find($course_id);

        return view('user.viewMember', compact('course_id', 'course'));
    }
}
