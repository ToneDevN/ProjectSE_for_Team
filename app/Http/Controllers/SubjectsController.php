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

        $subjectId = $request->id;
        $session = attendanceSession::where('subject_id', $subjectId)->get();
        $student = subject_has_students::where('subject_id', $subjectId)->get();
        $lecture = lecture::where('subject_id',$subjectId)->get();

        return view('teachers.scoreRollcall', [
            'id' => $subjectId,
            'sessions' => $session,
            'student' => $student,
            'attendance' => $lecture
        ]);
    }

    public function rollcallSessionStore(Request $request)
    {
        $subjectId = $request->subject_id;

        $attend = new attendanceSession;
        $attend->subject_id = (int) $subjectId;
        $attend->attendanceSession = $request->input('session');
        $attend->attendanceOpen = $request->input('attendanceOpen');
        $attend->attendanceClose = $request->input('attendanceClose');
        $attend->attendanceLate = $request->input('attendanceLate');
        $attend->save();

        $attends= attendanceSession::where('subject_id',$subjectId)->where('attendanceSession',$request->input('session'))->first();
        $students = subject_has_students::where('subject_id', $subjectId)->get();
        foreach($students as $student){
            $lecture = new lecture;
            $lecture->subject_id = (int) $subjectId;
            $lecture->student_id = $student->student->student_id;
            $lecture->attendanceSession_id = $attends->attendanceSession_id;
            $lecture->save();
        }
        

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
    public function editSubject(Request $request)
    {
        $subjectId = $request->input('subject_id');

        $subject = subjects::where('subject_id',$subjectId)->first();

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
    public function deleteSubject(Request $request)
    {
        $subjectId = $request->input('id');

        subjects::destroy($subjectId);
        
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
