@include('layouts.header')
<div class="row p-3 d-flex justify-content-center">
 <div class="col-md-7">

   <h2 class="text-center p-5">Create new Book</h2>

<form action="{{route('book.update', $book->id)}}" method="post">

<div class="input-group mb-3">
      <select class="custom-select" id="inputGroupSelect01" name="author_id">
        <!-- atspausdinami visi autoriai is DB -->
        <option disabled>Select author: </option>
        @foreach($authors as $author)
          <option value ="{{$author->id}}">{{$author->name. " " . $author->surname}}</option>
        @endforeach
      </select>
  </div>
<!--  -->
   <div class="form-group">
   <label for="exampleFormControlInput1">Title</label>
   <!-- Value atspausdinam gaunant $id parametra ir pasiimam is db Visa info apie sia knyga -->
   <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{$book->title}}" required>
 </div>
 <div class="form-group">
   <label for="exampleFormControlInput1">Pages</label>
   <input type="number" name="pages" class="form-control" id="exampleFormControlInput1" value="{{$book->pages}}" required">
 </div>
 <div class="form-group">
   <label for="exampleFormControlInput1">Isbn</label>
   <input type="text" name="isbn" class="form-control" id="exampleFormControlInput1" value="{{$book->isbn}}" required>
 </div>
 <div class="form-group">
   <label for="exampleFormControlInput1">Description</label>

   <textarea name="description" required>{{$book->short_description}}</textarea>
 </div>
 {{ csrf_field() }}
 <button type="submit" class="btn btn-primary mb-2">Confirm</button>
</form>

 </div>
</div>
 <a href="{{route('book.index')}}">Grizti atgal</a>
</div>




@include('layouts.footer')
