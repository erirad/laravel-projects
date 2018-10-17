  @include('layouts.header')
  <div class="row p-3 d-flex justify-content-center">
   <div class="col-md-7">

     <h2 class="text-center p-5">Create new Author</h2>
     <!-- pass the parameter to route owner.update, $owner->id-->
 <form
 @if(isset($author))
 action="{{route('author.update', $author->id)}}"
 @else
 action="{{route('author.store')}}"
 @endif
 method="post">
     <div class="form-group">
     <label for="exampleFormControlInput1">Name</label>
     <input type="text" name="name" class="form-control" id="exampleFormControlInput1" @if(isset($author)) value="{{$author->name}}" @endif required>
   </div>
   <div class="form-group">
     <label for="exampleFormControlInput1">Surname</label>
     <input type="text" name="surname" class="form-control" id="exampleFormControlInput1" @if(isset($author)) value="{{$author->surname}}" @endif required>
   </div>
   {{ csrf_field() }}
   <button type="submit" class="btn btn-primary mb-2">Confirm</button>
 </form>

   </div>
  </div>
   <a href="{{route('author.index')}}">Grizti atgal</a>
 </div>




  @include('layouts.footer')
