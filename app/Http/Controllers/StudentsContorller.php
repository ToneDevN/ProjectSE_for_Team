<?php

namespace App\Http\Controllers;

use App\Models\attendanceSession;
use App\Models\lab;
use App\Models\lecture;
use App\Models\subject_has_students;
use App\Models\subjects;
use Illuminate\Http\Request;

class StudentsContorller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = subject_has_students::where('student_id', auth()->user()->id)->get();
        return view('studetns.index', [
            'subject' => $subject
        ]);
    }

    public function subject(Request $request)
    {
        $subjectId = $request->id;
        $subject = subjects::where('subject_id', $subjectId)->first();
        return view('studetns.subject', [
            'id' => $subjectId,
            'subject' => $subject
        ]);
    }
    public function score(Request $request)
    {
        $subjectId = $request->id;
        $session = attendanceSession::where('subject_id', $subjectId)->get();
        $scoreLab = lab::where('subject_id', $subjectId)->where('student_id', auth()->user()->id)->get();
        $scoreLecture = lecture::where('subject_id', $subjectId)->where('student_id', auth()->user()->id)->get();
        return view('studetns.score', [
            'id' => $subjectId,
            'lab' => $scoreLab,
            'lectures' => $scoreLecture,
            'sessions'=>$session

        ]);

    }
    public function attendance(Request $request)
    {
        $subjectId = $request->id;
        return view('studetns.rollCall', [
            'id' => $subjectId
        ]);
    }

    public function attendacerecord(Request $request)
    {
        $attend = lecture::where('attendanceSession_id', $request->input('attend'))
            ->where('subject_id', $request->input('subject_id'))
            ->where('student_id', auth()->user()->id)
            ->first();

        if ($attend) {
            $attend->lectureScore = 1;
            $attend->save();
        }

        return redirect('students.score', ['id' => $request->input('subject_id')]);
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
