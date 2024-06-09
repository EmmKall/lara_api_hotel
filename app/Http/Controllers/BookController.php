<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(){
        $data = Book::all();
        foreach ( $data as $key => $item ) {
            $item->huesped;
            $item->cuarto;
        }
        return [
            'status' => 200,
            'msg'    => 'request successfully',
            'data'   => $data
        ];
    }

    public function find( int $id ){
        $row = Book::find( $id );
        $row->cuarto;
        $row->huesped;
        return [
            'status' => 200,
            'msg'    => 'Request successfully',
            'data'   => $row
        ];
    }

    public function store( Request $request ){
        $request->validate([
            'huesped_id' => 'required',
            'cuarto_id'  => 'required',
            'in'         => 'required',
            'out'        => 'required',
            'check_in'   => 'required'
        ]);
        $row = Book::create( $request->all() );
        return [
            'status' => 201,
            'msg'    => 'Request successfully',
            'data'   => $row
        ];
    }

    public function update( Request $request, int $id ){
        $request->validate([
            'huesped_id' => 'required',
            'cuarto_id'  => 'required',
            'in'         => 'required',
            'out'        => 'required',
            'check_in'   => 'required'
        ]);
        $row = Book::find( $id );
        if( $row !== null ){
            $row->update( $request->all() );
        }
        return [
            'status' => 200,
            'msg'    => 'Request successfully',
            'data'   => $row
        ];
    }

    public function checkIn( int $id ){
        $row = Book::find( $id );
        if( $row !== null ){
            $row->check_in = true;
            $row->save();
        }
        return [
            'status' => 200,
            'msg'    => 'Request successfully',
            'data'   => $row
        ];
    }

    public function destroy( int $id ){
        $row = Book::find( $id );
        if( $row !== null ){
            $row->delete();
        }
        return [
            'status' => 200,
            'msg'    => 'Request successfully'
        ];
    }


}
