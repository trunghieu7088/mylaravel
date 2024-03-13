<div class="form-group">
    <label for="exampleFormControlSelect1">Student List</label>
    <select class="form-control" id="exampleFormControlSelect1">
      @unless(empty($checkid))
      	@foreach ($studentcomp as $studentcom)	      		  
   		  @if ($studentcom->id==$checkid)
      		<option id="{{ $studentcom->id }}" selected="selected">{{ $studentcom->name }}</option>
      	  @else
			<option id="{{ $studentcom->id }}">{{ $studentcom->name }}</option>
   	      @endif      
     	@endforeach
      @endunless

      @empty($checkid)
      @foreach ($studentcomp as $studentcom)	
      <option id="{{ $studentcom->id }}">{{ $studentcom->name }}</option>
      @endforeach
      @endempty
    	
    </select>
</div>



                  
                    