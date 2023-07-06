@extends('layouts.app')



@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parent Student List  ({{ $getParent->name }})</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">


      <div class="container-fluid">
        <div class="row">


        
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
           <h3 class="card-title">Search Student</h3>    
           </div> 
           <form method="get" action="">
               <div class="card-body">
                   <div class="row">

                    <div class="form-group col-md-3">
                        <label>Student ID</label>
                        <input type="text" class="form-control" value="{{ Request::get('id')}}" name="id"  placeholder="Student ID">
                      </div>

                    <div class="form-group col-md-3">
                      <label>Name</label>
                      <input type="text" class="form-control" value="{{ Request::get('name')}}" name="name"  placeholder="Name">
                    </div>
          
                  <div class="form-group col-md-3">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{ Request::get('email')}}"  placeholder="Email">
                  </div>

                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 32px">Search</button>
                     <a href="{{ url('admin/parent/my-student/' .$parent_id) }}" class="btn btn-success" style="margin-top: 32px">Reset</a> 
                  </div>
                </div>
                </div>


                </form>
              </div>

            @include('_message')

            <!-- /.card -->
        @if(!empty($getSearchStudent))
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Student List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Foto Profile</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Nama Orang Tua</th>
                      <th>Create date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($getSearchStudent as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>
                              @if(!empty($value->getProfile()))
                              <img src="{{$value->getProfile()}}" style="height: 50px; width:50px; border-radius: 50px;">
                              @endif
                            </td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->parent_name }}</td>
                          <td>{{ date('d-m-Y H:i A', Strtotime($value->created_at)) }}</td>
                          <td style="min-width: 150px">
                            <a href="{{ url('admin/parent/assign_student_parent/' .$value->id. '/' .$parent_id)}}" class="btn btn-primary">Add Student to Parent</a>
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
            @endif


            
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Parent Student List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Foto Profile</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nama Orang Tua</th>
                        <th>Create date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($getRecord as $value)
                          <tr>
                              <td>{{ $value->id }}</td>
                              <td>
                                @if(!empty($value->getProfile()))
                                <img src="{{$value->getProfile()}}" style="height: 50px; width:50px; border-radius: 50px;">
                                @endif
                              </td>
                              <td>{{ $value->name }}</td>
                              <td>{{ $value->email }}</td>
                              <td>{{ $value->parent_name }}</td>
                            <td>{{ date('d-m-Y H:i A', Strtotime($value->created_at)) }}</td>
                            <td style="min-width: 150px">
                              <a href="{{ url('admin/parent/assign_student_parent_delete/' .$value->id)}}" 
                                class="btn btn-danger btn-sam">Delete</a>
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
