<?php

namespace App\Imports;

use App\Models\student;
use App\Models\subject_has_students;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;




class StudentImport implements ToModel
{
    protected $subjectCode;

    public function __construct($subjectCode)
    {
        $this->subjectCode = $subjectCode;
    }


    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $subjectCode = $this->subjectCode;
        $user = User::create([
            'name' => $row['ชื่อ'],
            'email' => $row['อีเมล'],
            'password' => Hash::make($row('รหัสนักศึกษา'))
        ]);

        $student = student::create([
            'student_id' => $user->id,
            'student_code' => $row['รหัสนักศึกษา'],
            'faculty' => $row['คณะ'],
            'branch' => $row['สาขา'],
        ]);

        subject_has_students::create([
            'student_id' => $student->student_id,
            'subject_id' => $subjectCode,
        ]);
    }
}
