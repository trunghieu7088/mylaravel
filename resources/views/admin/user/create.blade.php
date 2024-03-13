@extends('admin.main')

@section('title', 'Create Users')

@section('headline', 'Create Users')

@section('content')

 <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Users</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                 <form method="POST" action="{{route('SaveUser')}}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="UserName">Name</label>
                    <input type="text" class="form-control" id="UserName" placeholder="Enter name" name="UserName">
                  </div>
                  <div class="form-group">
                    <label for="UserEmail">Email</label>
                    <input type="text" class="form-control" id="UserEmail" placeholder="Enter Email" name="UserEmail">
                  </div>
                  <div class="form-group">
                    <label for="UserPassword">Password</label>
                    <input type="password" class="form-control" id="UserPassword" placeholder="Enter Password" name="UserPassword">
                  </div>
                  
                          

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                   <button type="submit" id="AddUserBtn" name="AddUser" class="btn btn-primary">Add User</button>

                      @if(Session::has('message'))
                       <x-alert status="{{session('status')}}" message="{{session('message')}}"/>
                       
                      @endif

                </div>
              </form>

              {{explode('@', Route::getCurrentRoute()->getActionName())[0]}}
              <br>
              {{explode('@', Route::getCurrentRoute()->getActionName())[1]}}

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
