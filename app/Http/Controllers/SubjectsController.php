<?php

namespace App\Http\Controllers;

use App\Models\attendanceSession;
use App\Models\lecture;
use App\Models\student;
use App\Models\subject_has_students;
use App\Models\subjects;
use App\Models\User;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('studetns.subject');
    }

    public function subjectTeacher(Request $request)
    {
        $subjectId = $request->id;
        $subject = subjects::where('subject_id', $subjectId)->first();
        return view('teachers.subject', [
            'id' => $subjectId,
            'subject' => $subject
        ]);
    }
    public function rollcall(Request $request)
    {
        $attendace = array();

        $subjectId = $request->id;
        $session = attendanceSession::where('subject_id',$subjectId)->get();
        $student = student::all();
        $student = subject_has_students::where('subject_id',$subjectId)->get();
        dd($student->student);
        // foreach($student as $student){
        //     foreach($){
        //         $attendace = lecture::where('student_id',$student->student_id)->get();
        //         dd($attendace);
        //     }
            
        // }
        

        return view('teachers.scoreRollcall', [
            'id' => $subjectId,
            'session' => $session,
            'student' => $student
        ]);
    }

    public function rollcallSessionStore(Request $request)
    {
        $subjectId = $request->subject_id;

        $subject = new attendanceSession;
        $subject->subject_id = (int) $subjectId;
        $subject->attendanceSession = $request->input('session');
        $subject->attendanceOpen = $request->input('attendanceOpen');
        $subject->attendanceClose = $request->input('attendanceClose');
        $subject->attendanceLate = $request->input('attendanceLate');
        $subject->save();

        return redirect()->route('teacher.rollcall', [
            'id' => $subjectId
        ]);
    }

    public function lab(Request $request)
    {
        $subjectId = $request->id;

        return view('teachers.scoreLab', [
            'id' => $subjectId
        ]);
    }
    public function manage(Request $request)
    {
        $subjectId = $request->id;

        $student = subject_has_students::where('subject_id', $subjectId)->get();

        return view('teachers.studetnManage', [
            'id' => $subjectId,
            'student' => $student

        ]);
    }
    public function export(Request $request)
    {
        $subjectId = $request->id;

        return view('teachers.export', [
            'id' => $subjectId
        ]);
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
        $subject = new subjects;
        $subject->subjectCode = $request->input('subject_code');
        $subject->user_id = auth()->user()->id;
        $subject->subjectName = $request->input('subject_name');
        $subject->description = $request->input('subject_desc');
        $subject->section = $request->input('section');
        $subject->term = $request->input('term');
        $subject->year = $request->input('year');
        $subject->save();

        return redirect()->route('teacher.home');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
