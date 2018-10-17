  @include('layouts.header')
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center text-success m-3">
      <!-- Isvedama zinute po atliktos f-jos  -->
            {{ session('info') }}
    </div>
  </div>
  <div class="row d-flex justify-content-center">
    <div class="col-md-12">
      <table class="table">
<thead>
<tr>
<th scope="col">Name</th>
<th scope="col">Surname</th>
<th scope="col" colspan="2"><a href="{{route('author.create')}}" class="btn btn-warning">Create New</a></th>
</tr>
      </thead>
          <tbody>
        <!--  spausdiname visus autorius kurie yra DB-->
                @foreach($authors as $author)
                <tr>
                  <td>{{ $author->name }}</td>
                  <td>{{ $author->surname }}</td>
                  <td> <a href="{{route('author.edit', $author->id)}}">Edit</a> </td>
                  <td>
                      <form action="{{route('author.destroy', $author->id)}}" method="post">
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
