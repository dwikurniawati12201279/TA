<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getTeacher();
        $data['header_title'] = "Teacher List";
        return view('admin.teacher.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add New Teacher";
        return view('admin.teacher.add', $data);
    }

    public function insert(Request $request)
    {
        
        request()->validate([
            'email' => 'required|email|unique:users'
        ]);

        $teacher = new User;
        $teacher->name = trim($request->name);
        if(!empty($request->tgl_lahir))
        {
            $teacher->tgl_lahir = trim($request->tgl_lahir);
        }

        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr =date('Ymdhis'). Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
        }

        $teacher->tmp_lahir = trim($request->tmp_lahir);
        $teacher->gender = trim($request->gender);
        $teacher->agama = trim($request->agama);
        $teacher->alamat = trim($request->alamat);
        $teacher->nomor_hp = trim($request->nomor_hp);

        if(!empty($request->admission_date))
        {
            $teacher->admission_date = trim($request->admission_date);
        }

        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        $teacher->password = Hash::make($request->password);
        $teacher->user_type = 2;
        $teacher->save();

        return redirect('admin/teacher/list')->with('success', "Teacher Successfully Created");

    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Teacher";
            return view('admin.teacher.edit', $data);
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

        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        if(!empty($request->tgl_lahir))
        {
            $teacher->tgl_lahir = trim($request->tgl_lahir);
        }

        if(!empty($request->file('profile_pic')))
        {
            if(!empty($teacher->getProfile()))
            {
                unlink('upload/profile/' .$teacher->profile_pic);
            }
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr =date('Ymdhis'). Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
        }

        $teacher->tmp_lahir = trim($request->tmp_lahir);
        $teacher->gender = trim($request->gender);
        $teacher->agama = trim($request->agama);
        $teacher->alamat = trim($request->alamat);
        $teacher->nomor_hp = trim($request->nomor_hp);

        if(!empty($request->admission_date))
        {
            $teacher->admission_date = trim($request->admission_date);
        }

        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);

        if(!empty($request->password))
        {
            $teacher->password = Hash::make($request->password);
        }
        
        $teacher->save();

        return redirect('admin/teacher/list')->with('success', "Teacher Successfully Updated");
    }

    public function delete($id)
    {

    $getRecord = User::getSingle($id);
    if(!empty($getRecord))
        {
            $getRecord->is_delete = 1;
            $getRecord->save();

            return redirect()->back()->with('success', "Teacher Successfully Deleted");
        }
    else
        {
        abort(404);
        }
    }
}
