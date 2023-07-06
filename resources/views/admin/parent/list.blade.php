@extends('layouts.app')



@section('content')
    
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parent List (Total : {{ $getRecord->total() }})</h1>
          </div>
          <div class="col-sm-6" style="text-align: right;">
         <a href="{{ url('admin/parent/add') }}" class="btn btn-primary">Add New Parent</a>
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
           <h3 class="card-title"> Search Parent</h3>    
           </div> 
           <form method="get" action="">
               <div class="card-body">
                   <div class="row">

                    <div class="form-group col-md-3">
                      <label>Name</label>
                      <input type="text" class="form-control" value="{{ Request::get('name')}}" name="name"  placeholder="Name">
                    </div>
          
                  <div class="form-group col-md-3">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{ Request::get('email')}}"  placeholder="Email">
                  </div>

                  <div class="form-group col-md-3">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}"  placeholder="Date">
                  </div>

                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 32px">Search</button>
                     <a href="{{ url('admin/parent/list') }}" class="btn btn-success" style="margin-top: 32px">Reset</a> 
                  </div>
                </div>
                </div>


                </form>
              </div>

            @include('_message')

            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Parent List</h3>
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
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>Nomor Telepon</th>
                      <th>Pekerjaan</th>
                      <th>Status</th>
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
                            <td>{{ $value->gender }}</td>
                            <td>{{ $value->alamat }}</td>
                            <td>{{ $value->nomor_hp }}</td>
                            <td>{{ $value->pekerjaan }}</td>
                            <td>{{ $value->status }}</td>
                          <td>{{ date('d-m-Y H:i A', Strtotime($value->created_at)) }}</td>
                          <td>
                            <a href="{{ url('admin/parent/edit/' .$value->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('admin/parent/delete/' .$value->id)}}" class="btn btn-danger">Delete</a>
                            <a href="{{ url('admin/parent/my-student/' .$value->id)}}" class="btn btn-primary">My Student</a>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float: right">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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
