<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Book;

class AuthorController extends Controller
{
  // tik prisijunges vartotojas gali viska matyti
  public function __construct()
  {
      $this->middleware('auth');

  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     // paimam visus autorius ir atvaizduojas
    public function index()
    {
       $authors = Author::all();
       return view('showAuthors', ['authors'=>$authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createAuthor');
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
      $author = new Author();
      // values is input
      $author->name = $request->input('name');
      $author->surname = $request->input('surname');

      $author->save();

// nusiunciam i kita psl ir perduodam zinute su info
    return redirect()->route('author.index')->with('info', '* ' . $request->input('name') . ' ' .$request->input('surname') . ' has been placed to DB');
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
     // paspaudus gaunamas id kuri reikes atvaizduoti
    public function edit($id)
    {
        $authorById = Author::find($id);
        return view('createAuthor', ['author'=> $authorById]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // i DB sukeliamos pa'editintos reiksmes
    public function update(Request $request, $id)
    {
      // DB suranda autoriu su tokiu $id
      $editAuthor = Author::find($id);
      $editAuthor->name = $request->input('name');
      $editAuthor->surname = $request->input('surname');
      $editAuthor->save();
      // nusiunciama zinute ir redirectinam
      return redirect()->route('author.index')->with('info', 'record was changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     // naikinam eilute, kurios $id gavome
    public function destroy($id)
    {
      $deleteAuthor = Author::find($id);
      $deleteAuthor->delete();
// redirectinam i pagrindini psl ir isvedam zinute
    return redirect()->route('author.index')->with('info', 'deleted from DB');
    }
}
