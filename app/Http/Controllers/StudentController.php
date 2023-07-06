<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = "Student List";
        return view('admin.student.list', $data);
    }
    
    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Add New Student";
        return view('admin.student.add', $data);
    }

    public function insert(Request $request)
    {

        request()->validate([
            'email' => 'required|email|unique:users'
        ]);

        $student = new User;
        $student->name = trim($request->name);
        $student->nis = trim($request->nis);
        $student->class_id = trim($request->class_id);
        if(!empty($request->tgl_lahir))
        {
            $student->tgl_lahir = trim($request->tgl_lahir);
        }

        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr =date('Ymdhis'). Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
        }

        $student->tmp_lahir = trim($request->tmp_lahir);
        $student->gender = trim($request->gender);
        $student->agama = trim($request->agama);
        $student->alamat = trim($request->alamat);
        $student->nama_ayah = trim($request->nama_ayah);
        $student->nama_ibu = trim($request->nama_ibu);
        $student->nomor_hp = trim($request->nomor_hp);

        if(!empty($request->admission_date))
        {
            $student->admission_date = trim($request->admission_date);
        }

        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = Hash::make($request->password);
        $student->user_type = 3;
        $student->save();

        return redirect('admin/student/list')->with('success', "Student Successfully Created");

    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = "Edit Student";
            return view('admin.student.edit', $data);
        }
        else
        {
            abort(404);
        }
    
    }

    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->nis = trim($request->nis);
        $student->class_id = trim($request->class_id);
        if(!empty($request->tgl_lahir))
        {
            $student->tgl_lahir = trim($request->tgl_lahir);
        }

        if(!empty($request->file('profile_pic')))
        {
            if(!empty($student->getProfile()))
            {
                unlink('upload/profile/' .$student->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr =date('Ymdhis'). Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
        }

        $student->tmp_lahir = trim($request->tmp_lahir);
        $student->gender = trim($request->gender);
        $student->agama = trim($request->agama);
        $student->alamat = trim($request->alamat);
        $student->nama_ayah = trim($request->nama_ayah);
        $student->nama_ibu = trim($request->nama_ibu);
        $student->nomor_hp = trim($request->nomor_hp);

        if(!empty($request->admission_date))
        {
            $student->admission_date = trim($request->admission_date);
        }

        $student->status = trim($request->status);
        $student->email = trim($request->email);

        if(!empty($request->password))
        {
            $student->password = Hash::make($request->password);
        }
        
        $student->save();

        return redirect('admin/student/list')->with('success', "Student Successfully Updated");
    }


    public function delete($id)
    {

    $getRecord = User::getSingle($id);
    if(!empty($getRecord))
        {
            $getRecord->is_delete = 1;
            $getRecord->save();

            return redirect()->back()->with('success', "Student Successfully Deleted");
        }
    else
        {
        abort(404);
        }
    }

    // teacher side

    public function MyStudent()
    {
        $data['getRecord'] = User::getTeacherStudent(Auth::user()->id);
        $data['header_title'] = "My Student List";
        return view('teacher.my_student', $data);
    }
}
