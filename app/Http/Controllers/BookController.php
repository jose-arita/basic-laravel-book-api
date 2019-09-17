<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Book::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = Book::create($request->all());
        return response()->json($book, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        if(is_null($book)){
            return response()->json(
                ['msj'=>'no se encontró'],
                404
            );    
        }else{
            return response()->json($book);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if(is_null($book)){
            return response()->json(
                ['msj'=>'no se encontró'],
                404
            );    
        }else{
            $book->price = $request->price;
            $book->save();
            return response()->json($book);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if(is_null($book)){
            return response()->json(
                ['msj'=>'no se encontró'],
                404
            );    
        }else{
            $book->delete();
            return response()->json(
                ['msj'=>'Se ha eliminado']
            );
        }
    }
}
