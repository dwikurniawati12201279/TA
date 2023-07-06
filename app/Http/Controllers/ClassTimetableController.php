<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\WeekModel;
use App\Models\ClassSubjectTimetableModel;

class ClassTimetableController extends Controller
{
   public function list(Request $request)
   {
    
    $data['getClass'] = ClassModel::getClass();

    if(!empty($request->class_id))
    {
        $data['getSubject'] = ClassSubjectModel::MySubject($request->class_id);
    }

    $getWeeks = WeekModel::getRecord();
    $weeks = array();
    foreach($getWeeks as $value)
    {
        $dataW = array();
        $dataW['weeks_id'] = $value->id;
        $dataW['weeks_name'] =$value->name;
        $weeks[] = $dataW;
    }

    $data['weeks'] = $weeks;

    $data['header_title'] = "Class Timetable List ";
    return view('admin.class_timetable.list', $data);
   }

   public function get_subject(Request $request)
   {
        $getSubject = ClassSubjectModel::MySubject($request->class_id);

        $html = "<option value=''>Select</option>";

        foreach($getSubject as $value)
        {
            $html .= "<option value='".$value->subject_id."'> " .$value->subject_name. "</option>";
        }

        $json['html'] = $html;
        echo json_encode($json);


   }

   public function insert_update(Request $request)
   {

             
    foreach ($request->timetable as $timetable)
    {
        if(!empty($timetable['weeks_id']) && !empty($timetable['start_time']) && !empty($timetable['end_time']) 
        && !empty($timetable['room_number']))
        {
            $save = new ClassSubjectTimetableModel;
            $save->class_id = $request->class_id;
            $save->subject_id = $request->subject_id;
            $save->weeks_id = $timetable['weeks_id'];
            $save->start_time = $timetable['start_time'];
            $save->end_time = $timetable['end_time'];
            $save->room_number = $timetable['room_number'];
            $save->save();
        }
    }
    
    return redirect()->back()->with('success', "Class Timetable successfully Saved");
   }


}
