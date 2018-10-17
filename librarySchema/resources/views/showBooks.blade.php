@include('layouts.header')
<div class="container">

<div class="row">
  <div class="col-md-12 text-center text-success m-3">
          <!-- Isvedama zinute po atliktos f-jos  -->
  {{ session('info') }}
<!-- filtravimui reikalingas parametras - author id -->
  <form action="{{route('book.filter')}}" method="post">

    <div class="input-group mb-3">
          <select class="custom-select" id="inputGroupSelect01" name="author_id" required>
            <option selected disabled>Select author.. </option>
            <!-- gaunami visi autoriai is DB -->
            @foreach($authors as $author)
              <option value ="{{$author->id}}">{{$author->name . " " . $author->surname}}</option>
            @endforeach
          </select>
      </div>
      {{ csrf_field() }}
      <button type="submit" class="btn btn-primary mb-2">Filter</button>
</form>

  </div>
</div>
<div class="row d-flex justify-content-center">
  <div class="col-md-12">
    <table class="table">
<thead>
<tr>
<th scope="col">Title</th>
<th scope="col">Pages</th>
<th scope="col">Isbn</th>
<th scope="col">Description</th>
<th scope="col">Author name</th>
<th scope="col">Author surname</th>
<!-- nusiuncia i blade kurti nauja knyga -->
<th scope="col" colspan="2"><a href="{{route('book.create')}}" class="btn btn-warning">Create New</a></th>
</tr>
    </thead>
        <tbody>
<!--  atspausdinamos visos knygos-->
              @foreach($books as $book)
              <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->pages }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->short_description }}</td>
                <td>{{ $book->author->name }}</td>
                <td>{{ $book->author->surname }}</td>

                <td> <a href="{{route('book.edit', $book->id)}}">Edit</a> </td>
                <td>
                    <form action="{{route('book.destroy', $book->id)}}" method="post">
                      {{ csrf_field() }}
                      <button type="submit" class="fas fa-trash-alt p-1"></button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>

</div>


</div>
@include('layouts.footer')
