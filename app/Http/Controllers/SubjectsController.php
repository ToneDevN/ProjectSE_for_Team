<?php

namespace App\Http\Controllers;

use App\Models\subjects;
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

    public function subjectTeacher(Request $request){
        $subjectId = $request->id;
        $subject = subjects::where('subject_id', $subjectId)->first();
        return view('teachers.subject',[
            'id' =>$subjectId,
            'subject' => $subject
        ]);
    }
    public function rollcall(Request $request){
        $subjectId = $request->id;

        return view('teachers.scoreRollcall',[
            'id' =>$subjectId
        ]);
    }
    public function lab(Request $request){
        $subjectId = $request->id;

        return view('teachers.scoreLab',[
            'id' =>$subjectId
        ]);
    }
    public function manage(Request $request){
        $subjectId = $request->id;

        return view('teachers.studetnManage',[
            'id' =>$subjectId
        ]);
    }
    public function export(Request $request){
        $subjectId = $request->id;

        return view('teachers.export',[
            'id' =>$subjectId
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
