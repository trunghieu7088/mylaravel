<div class="form-group">
    <label for="exampleFormControlSelect1">Comic Category</label>
    <select class="form-control" id="category_list" name="category">
    @foreach ($comic_category_composer as $comic_category_item)  
      <option value="{{ $comic_category_item->id }}">{{ $comic_category_item->name }}</option>
    @endforeach
    </select>
    
</div>



                  
                    