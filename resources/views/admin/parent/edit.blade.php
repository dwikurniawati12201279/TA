@extends('layouts.app')



@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Parent</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <form method="post" action="" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nama<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" value="{{ old('name', $getRecord->name) }}" name="name" required placeholder="Nama">
                            <div style="color:red">{{ $errors->first('name') }}</div> 
                        </div>

                        <div class="form-group col-md-6">
                          <label>Jenis Kelamin<span style="color: red;">*</span></label>
                          <select class="form-control" required name="gender">
                          <option value="">Pilih Jenis Kelamin</option>
                          <option {{ (old('gender', $getRecord->gender) == 'Laki-laki') ? 'selected' : '' }} value="Laki-laki">Laki-laki</option>
                          <option {{ (old('gender', $getRecord->gender) == 'Perempuan') ? 'selected' : '' }} value="Perempuan">Perempuan</option>
                          </select>
                          <div style="color:red">{{ $errors->first('gender') }}</div>
                      </div>

                        <div class="form-group col-md-6">
                            <label>Alamat<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" value="{{ old('alamat', $getRecord->alamat) }}" name="alamat" required placeholder="Alamat">
                            <div style="color:red">{{ $errors->first('alamat') }}</div>
                          </div>

                        <div class="form-group col-md-6">
                            <label>Nomor Telepon<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" value="{{ old('nomor_hp', $getRecord->nomor_hp) }}" name="nomor_hp" required placeholder="Nomor Telepon">
                            <div style="color:red">{{ $errors->first('nomor_hp') }}</div>
                          </div>


                          <div class="form-group col-md-6">
                            <label>Pekerjaan<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" value="{{ old('pekerjaan', $getRecord->pekerjaan) }}" name="pekerjaan" required placeholder="Pekerjaan">
                            <div style="color:red">{{ $errors->first('nomor_hp') }}</div>
                          </div>


                          <div class="form-group col-md-6">
                            <label>Foto Profile<span style="color: red;">*</span></label>
                            <input type="file" class="form-control" name="profile_pic">
                            <div style="color:red">{{ $errors->first('profile_pic') }}</div>
                            @if (!empty($getRecord->getProfile()))
                            <img src="{{ $getRecord->getProfile() }}" style="width: auto;height: 50px;">
                            @endif
                        </div>

                    <div class="form-group col-md-6">
                        <label>Status<span style="color: red;">*</span></label>
                        <select class="form-control" required name="status">
                        <option value="">Select Status</option>
                        <option {{ (old('status',$getRecord->status) == 0) ? 'selected' : '' }} value="0">Active</option>
                        <option {{ (old('status', $getRecord->status) == 1) ? 'selected' : '' }} value="1">Inactive</option>
                        </select>
                        <div style="color:red">{{ $errors->first('status') }}</div>
                      </div>

                    </div>

                    <hr/>
                    <div class="form-group">
                        <label>Email<span style="color: red;">*</span></label>
                        <input type="email" class="form-control" name="email" value="{{ old('email', $getRecord->email) }}" required placeholder="Email">
                       <div style="color:red">{{ $errors->first('email') }}</div> 
                      </div>
                   
                        <div class="form-group">
                        <label>Password<span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="password" placeholder="Password">
                        <p>Do you want to change password so Please add new password</p>
                    </div>
                </div>
            </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div>

          </div>
          <!--/.col (left) -->
          <!-- right column -->

          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
