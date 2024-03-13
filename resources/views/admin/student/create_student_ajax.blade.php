@extends('admin.main')

@section('title', 'Create Student')

@section('headline', 'Create Student')

@section('content')
    

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Student</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                 <form>
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="StudentName">Name</label>
                    <input type="text" class="form-control" id="StudentName" placeholder="Enter name" name="StudentName">
                  </div>
                  <div class="form-group">
                    <label for="StudentClass">Class</label>
                    <input type="number" class="form-control" id="StudentClass" placeholder="Enter Class" name="StudentClass">
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                   <button type="submit" id="AddStudentBtnAjax" name="AddStudent" class="btn btn-primary">Add Student</button>
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
@php


@endphp

@endsection

