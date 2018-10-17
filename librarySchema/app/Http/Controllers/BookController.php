<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     // neprisijungus puslapis nepasiekiamas
     public function __construct()
     {
         $this->middleware('auth');

     }
   // visas knygas rikiuojam pagal pavadinimas
   //paselectinam visus autorius
    public function index()
    {
      $books = Book::orderBy('title', 'asc')->get();
      $authors = Author::all();
      return view('showBooks', ['books'=>$books, 'authors'=>$authors]);
    }
    //gaunamas autoriaus $id ir rodomos visos knygos
    public function filter(Request $request)
    {
      $authors = Author::all();
      $filterBy = $request->input('author_id');
      $books = Book::where('author_id', $filterBy)->get();
      return view('showBooks', ['books'=>$books, 'authors'=>$authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $authors = Author::all();

        return view('createBook', ['authors'=>$authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     // ikeliam naujas input reiksmes i DB
    public function store(Request $request)
    {
      $bookStore = new Book();
      $bookStore->title = $request->input('title');
      $bookStore->pages = $request->input('pages');
      $bookStore->isbn = $request->input('isbn');
      $bookStore->short_description = $request->input('description');
      $bookStore->author_id = $request->input('author_id');

      $bookStore->save();


    return redirect()->route('book.index')->with('info', '* ' . $request->input('title') . ' has been placed to DB');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // pagal paduota parametra editinam knyga
    public function edit($id)
    {
        $bookById = Book::find($id);
        $authors = Author::all();
        return view('editBook', ['book'=>$bookById, 'authors'=>$authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $editBook = Book::find($id);
      $editBook->title = $request->input('title');
      $editBook->pages = $request->input('pages');
      $editBook->isbn = $request->input('isbn');
      $editBook->short_description = $request->input('description');
      $editBook->author_id = $request->input('author_id');

      $editBook->save();
      return redirect()->route('book.index')->with('info', 'record was changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $deleteBook = Book::find($id);
      $deleteBook->delete();
        return redirect()->route('book.index')->with('info', 'deleted from DB');
    }
}
