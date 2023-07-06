<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\StudentAttendanceModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AttendanceStudentController extends Controller
{
    public function AttendanceStudent(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();

        if(!empty($request->get('class_id')) && !empty($request->get('attendance_date')))
        {
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));
        }

        $data['header_title'] = "Student Attendance";
        return view('admin.attendance.student', $data);
    }

    public function AttendanceStudentSubmit(Request $request)
    {
        $attendance = new StudentAttendanceModel;
        $attendance->student_id = $request->student_id;
        $attendance->attendance_type = $request->attendance_type;
        $attendance->class_id = $request->class_id;
        $attendance->attendance_date = $request->attendance_date;
        $attendance->created_by = Auth::user()->id;
        $attendance->save();

        $json['message'] = "Attendace Successfully Saved";
        echo json_encode($json);
    }
}
