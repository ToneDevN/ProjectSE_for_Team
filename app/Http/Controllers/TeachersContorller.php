<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\subject_has_students;
use App\Models\subjects;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeachersContorller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subject = subjects::where('user_id',auth()->user()->id)->get();
        return view('teachers.index',[
            'subject' => $subject
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
    public function storeStudent(Request $request)
    {
        $subject_id = (int) $request->input('subject_id');
        
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('code'));
        $user->save();

        $student = new student;
        $student->student_code = $request->input('code');
        $student->faculty = $request->input('faculty');
        $student->branch = $request->input('branch');
        $user->student()->save($student);

        $subject = new subject_has_students;
        $subject->student_id = $user->id;
        $subject->subject_id = $subject_id;
        $subject->save();

        return redirect()->route('teacher.manage',['id' => $subject_id]);
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
