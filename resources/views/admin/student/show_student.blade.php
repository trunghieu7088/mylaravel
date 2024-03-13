@extends('admin.main')

@section('title', 'Update Student')

@section('headline', 'Update Student')

@section('content')
    

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Student</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                 <form method="POST" action="{{route('UpdateStudent')}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id" id="id" value="{{$student->id}}">
                    <label for="StudentName">Name</label>
                    <input type="text" class="form-control" value="{{$student->name}}" id="StudentName" placeholder="Enter name" name="StudentName">
                  </div>
                  <div class="form-group">
                    <label for="StudentClass">Class</label>
                    <input type="number" class="form-control" value="{{$student->class}}" id="StudentClass" placeholder="Enter Class" name="StudentClass">
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                   <button type="submit" id="UpdateStudentBtn" name="UpdateStudent" class="btn btn-primary">Update Student</button>

                      @if(Session::has('message'))
                       <x-alert status="{{session('status')}}" message="{{session('message')}}"/>
                       
                      @endif

                </div>
              </form>



            </div>

           

          </div>
          <!-- /.col-md-6 -->
       
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->


@endsection

