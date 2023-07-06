@extends('layouts.app')



@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Student</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">


      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12">

            @include('_message')
      
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">My Student</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0"style="overflow: auto;">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Foto Profile</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Agama</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Admission Date</th>
                        <th>Created Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($getRecord as $value)
                      <tr>

                        <td>
                          @if(!empty($value->getProfile()))
                          <img src="{{$value->getProfile()}}" style="height: 50px; width:50px; border-radius: 50px;">
                          @endif
                        </td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->nis }}</td>
                        <td>{{ $value->class_name }}</td>
                        <td>{{ $value->gender }}</td>
                        <td>
                          @if (!empty($value->tgl_lahir))
                              {{ date('d-m-Y', Strtotime($value->tgl_lahir)) }}
                          @endif
                          </td>
                        <td>{{ $value->tmp_lahir }}</td>
                        <td>{{ $value->agama }}</td>
                        <td>{{ $value->alamat }}</td>
                        <td>{{ $value->nomor_hp }}</td>
                        <td>
                          @if (!empty($value->admission_date))
                              {{ date('d-m-Y', Strtotime($value->admission_date)) }}
                          @endif
                          </td>
                        <td>{{ date('d-m-Y H:i A', Strtotime($value->created_at)) }}</td>
                        <td>
                          <a class="btn btn-primary btn-sm" href="{{ url('parent/my_student/subject/' .$value->id) }}">Subject</a>
                        </td>
                      </tr>
                  @endforeach
                    </tbody>
                  </table>
                  <div style="padding: 10px; float: right">
                </div>
  
                </div>
                <!-- /.card-body -->
              </div>
          

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
