<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comic;
use App\Models\ComicCategory;
use App\Models\ComicCoverImage;
use App\Http\Requests\CreateComicFormRequest;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\DB;


class ComicController extends Controller
{
    public function comic_list()
    {
      //$comics = Comic::find(1);
      //$comics = Comic::with('comiccategory')->paginate(10);
    //  $comic_count = Comic::all()->count();
      $comics = Comic::with(['ComicCoverImage','ComicCategory'])->paginate(10);
     // $comics = Comic::paginate(10);

    /*  $comics_list = $comics->map(function($item,$key)
      {
          if($item->view < 500)
          {
            $item->view +=0;
          }
          return $item;
      })->all();*/
      return view('admin.comic.comic_list',['comics'=>$comics]);
    }

    public function create()
    {
    	return view('admin.comic.create');
    }
    public function saveComic(CreateComicFormRequest $request)
    {
    	if ($request->isMethod('post')) 
        {
        	$validated = $request->validated();
          $comic = new Comic;
          $comic->title = $validated['title'];
          $comic->view = 0;
          $comic->author=$validated['author'];
          $comic->state=1;
          $comic->category=$request->input('category');
          $comic->save();
          //$cover_image= new ComicCoverImage(['image'=>'test save','comic_id'=>$comic->id]);

          if ($request->hasFile('imageupload')) 
          {                       
            $file_name=$request->file('imageupload')->getClientOriginalName();             
            $path = $request->file('imageupload')->storeAs('avatars',$file_name);
          }
          $cover_image= new ComicCoverImage;
          $cover_image->image=$path;
          $cover_image->comic_id=$comic->id;
          $cover_image->save();
          //$comic->ComicCoverImage->save($cover_image);
          return redirect()->route('CreateComic')->with('message', 'Add comic successfully !')->with('status','success');    
        }
    }
    public function saveComicAjax(CreateComicFormRequest $request)
    {
      if($request->ajax())
      {
        $validated = $request->validated();
          $comic = new Comic;
          $comic->title = $validated['title'];
          $comic->view = 0;
          $comic->author=$validated['author'];
          $comic->state=1;
          $comic->category=$request->input('category');
          $comic->save();
          //$cover_image= new ComicCoverImage(['image'=>'test save','comic_id'=>$comic->id]);
                     
            $file_name=$request->file('imageupload')->getClientOriginalName();             
            $path = $request->file('imageupload')->storeAs('avatars',$file_name);
          
          $cover_image= new ComicCoverImage;
          $cover_image->image=$path;
          $cover_image->comic_id=$comic->id;
          $cover_image->save();
          $msg='success';
          return response()->json(array('message'=> $msg), 200); 
      }
    }
    public function create_ajax()
    {
      return view('admin.comic.create_comic_ajax');
    }
    public function deleteComic($id)
    {      
      $comic=Comic::findOrFail($id);
     // $comic_cover_image=ComicCoverImage::where('comic_id',$comic->id);
     // $comic_cover_image->delete();
      $comic->delete();
      return redirect()->route('ComicList');
    }

    public function deleteComicajax(Request $request)
    {
       if($request->ajax())
       {
          $id=$request->input('id');
          $comic=Comic::findOrFail($id);
         /* $comic_cover_image=ComicCoverImage::where('comic_id',$comic->id);
          $comic_cover_image->delete();
          $comic->delete();
          $msg='success';
          return response()->json(array('message'=> $msg), 200); */
         // $comic->ComicCoverImage->delete();

          $comic->delete();
          $msg='success';
          return response()->json(array('message'=> $msg), 200);
       }       
       else
       {
        return redirect()->route('ComicList');
       }
    }
}
