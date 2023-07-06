@extends('layouts.app')



@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Account</h1>
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

            @include('_message')

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
                            <label>NIS<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" value="{{ old('nis', $getRecord->nis) }}" name="nis" required placeholder="NIS">
                            <div style="color:red">{{ $errors->first('nis') }}</div> 
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
                            <label>Tanggal Lahir<span style="color: red;">*</span></label>
                            <input type="date" class="form-control" required value="{{ old('tgl_lahir', $getRecord->tgl_lahir) }}" name="tgl_lahir">
                            <div style="color:red">{{ $errors->first('tgl_lahir') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Tempat Lahir<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" value="{{ old('tmp_lahir', $getRecord->tmp_lahir) }}" name="tmp_lahir" required placeholder="Tempat Lahir">
                            <div style="color:red">{{ $errors->first('tmp_lahir') }}</div>
                          </div>

                        <div class="form-group col-md-6">
                            <label>Agama<span style="color: red;">*</span></label>
                            <select class="form-control" required name="agama">
                            <option value="">Pilih Agama</option>
                            <option {{ (old('agama', $getRecord->agama) == 'Islam') ? 'selected' : '' }} value="Islam">Islam</option>
                            <option {{ (old('agama', $getRecord->agama) == 'Katolik') ? 'selected' : '' }} value="Islam">Katolik</option>
                            <option {{ (old('agama', $getRecord->agama) == 'Protestan') ? 'selected' : '' }} value="Protestan">Protestan</option> 
                            <option {{ (old('agama', $getRecord->agama) == 'Hindu') ? 'selected' : '' }} value="Hindu">Hindu</option>
                            <option {{ (old('agama', $getRecord->agama) == 'Budha') ? 'selected' : '' }} value="Budha">Budha</option>
                            </select>
                            <div style="color:red">{{ $errors->first('agama') }}</div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Alamat<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" value="{{ old('alamat', $getRecord->alamat) }}" name="alamat" required placeholder="Alamat">
                            <div style="color:red">{{ $errors->first('alamat') }}</div>
                          </div>

                        <div class="form-group col-md-6">
                            <label>Nama Ayah<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" value="{{ old('nama_ayah', $getRecord->nama_ayah) }}" name="nama_ayah" required placeholder="Nama Ayah">
                            <div style="color:red">{{ $errors->first('nama_ayah') }}</div>
                          </div>

                        <div class="form-group col-md-6">
                            <label>Nama Ibu<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" value="{{ old('nama_ibu', $getRecord->nama_ibu) }}" name="nama_ibu" required placeholder="Nama Ibu">
                            <div style="color:red">{{ $errors->first('nama_ibu') }}</div>
                          </div>

                        <div class="form-group col-md-6">
                            <label>Nomor Telepon<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" value="{{ old('nomor_hp', $getRecord->nomor_hp) }}" name="nomor_hp" required placeholder="Nomor Telepon">
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
  
                    </div>

                    <hr/>

                  <div class="form-group">
                    <label>Email<span style="color: red;">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $getRecord->email) }}" required placeholder="Email">
                   <div style="color:red">{{ $errors->first('email') }}</div> 
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
