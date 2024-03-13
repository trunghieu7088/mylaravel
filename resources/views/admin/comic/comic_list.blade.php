@extends('admin.main')

@section('title', 'Comic List')

@section('headline', 'Comic List')

@section('content')
    

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
                      <th>Author</th>
                      <th>Category</th>
                      <th>View</th>
                      <th>Cover Image</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($comics as $comic)
                    <tr data-row="{{$comic->id}}">
                    <td>{{ $comic->id }}</td>
                    <td>{{ $comic->title }}</td>
                    <td>{{ $comic->author }}</td>
                    
                     <td>@isset ($comic->NameComicCategoryName) {{  $comic->NameComicCategoryName}} @endisset </td>
                    <td>{{ $comic->view }}</td>
                  
                     <td>
                      @isset ($comic->ComicCoverImage->image)
                      <img src="{{asset('upload/'.$comic->ComicCoverImage->image)}}" class="img-thumbnail" style="width:100px;height:100px">
                      @endisset
                    </td>
                    
                    <td>
                      
                      <a href="#" data-comic="{{$comic->id}}" class="btn btn-danger delete-comic">Delete</a>
                    </td>
                    </tr>
                    @endforeach                    
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            {{ $comics->links() }}

            </div>

           
           

          </div>
       
        </div>
    
      </div>
 
 
 
@endsection

