@extends('admin.main')

@section('title', 'Create Comic')

@section('headline', 'Create Comic')

@section('content')
    

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
          
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Comic</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                 <form method="POST" action="{{route('SaveComic')}}" enctype="multipart/form-data" id="createcomicform">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
                  </div>
                  <div class="form-group">
                    <label for="Author">Author</label>
                    <input type="text" class="form-control" id="author" placeholder="Enter Author" name="author">
                  </div>
                   
                    

                   @includeIf('admin.comic.comic_category')
                   <div class="form-group">
                    <label for="fileToUpload">Upload</label>
                    <input type="file" name="imageupload" id="fileToUpload">
                  </div>  

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                   <button type="submit" id="AddComicbtn" name="AddComic" class="btn btn-primary">Add Comic</button>

                    @if(Session::has('message'))
                       <x-alert status="{{session('status')}}" message="{{session('message')}}"/>
                       
                      @endif

                  @if($errors->any())
                      @foreach ($errors->all() as $error)
                      
                      
                         <x-alert status="fail" message="{{ $error }}"/>
                        @endforeach
                      @endif
                      </div>
                      
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

