<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function MyAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "Change Password";
        if(Auth::User()->user_type == 1)
        {
            return view('admin.my_account', $data);
        }
        elseif(Auth::User()->user_type == 2)
        {
            return view('teacher.my_account', $data);
        }
        elseif (Auth::User()->user_type == 3)
        {
            return view('student.my_account', $data);
        }
        elseif (Auth::User()->user_type == 4)
        {
            return view('parent.my_account', $data);
        }
    }

    public function UpdateMyAccount(Request $request)
    {

        $id = Auth::user()->id;
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

            $teacher->email = trim($request->email);
    
            if(!empty($request->password))
            {
                $teacher->password = Hash::make($request->password);
            }
            
            $teacher->save();
    
            return redirect()->back()->with('success', "Account Successfully Updated");
        }

        public function UpdateMyAccountStudent(Request $request)
        {
            $id = Auth::user()->id;
            request()->validate([
                'email' => 'required|email|unique:users,email,'.$id,
            ]);
    
            $student = User::getSingle($id);
            $student->name = trim($request->name);
            $student->nis = trim($request->nis);
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

            $student->email = trim($request->email);
            $student->save();
    
            return redirect()->back()->with('success', "Account Successfully Updated");
        }

        public function UpdateMyAccountParent(Request $request)
        {
            $id = Auth::user()->id;
            request()->validate([
                'email' => 'required|email|unique:users,email,'.$id,
            ]);
    
            $student = User::getSingle($id);
            $student->name = trim($request->name);
    
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
            $student->alamat = trim($request->alamat);
            $student->nomor_hp = trim($request->nomor_hp);

            $student->email = trim($request->email);

            $student->save();
            return redirect()->back()->with('success', "Account Successfully Updated");
        }

        public function UpdateMyAccountAdmin(Request $request)
        {
            $id = Auth::user()->id;
            request()->validate([
                'email' => 'required|email|unique:users,email,'.$id
            ]);
    
            $user = User::getSingle($id);
            $user->name = trim($request->name);
            $user->email = trim($request->email);
            $user->save();
    
            return redirect()->back()->with('success', "Account Successfully Updated");
        }
    
    

    public function change_password()
    {
        $data['header_title'] = "Change Password";
        return view('profile.change_password', $data);
    }

    public function update_change_password(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password))
        {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', "Password successfully update");
        }
        else
        {
            return redirect()->back()->with('error', "Old Password is not Correct");
        }
    }

}