@extends('admin.main')

@section('title', 'Student List')

@section('headline', 'Student List')

@section('content')
    
{{Auth::id()}}
{{var_dump(Auth::user())}}
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          
            	<div class="card">
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Class</th>
                      <th>Edit</th>
                    </tr>
                  </thead>
                  <tbody>
                  	@foreach ($students as $student)
                  	<tr data-row="{{$student->id}}">
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->class }}</td>
          			<td><a href="{{route('ShowStudent',['id'=>$student->id])}}" class="btn btn-secondary">Edit</a></td>
                    </tr>
                  	@endforeach                    
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>


            </div>

           
            {{ $students->links() }}

          </div>
       
        </div>
    
      </div>


@endsection