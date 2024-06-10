<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cuarto;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $books = Book::where( 'cuarto_id', '=', $request->cuarto_id )->get();
        $in = Carbon::parse( $request->in );
        $out = Carbon::parse( $request->out );
        //Valid dates
        foreach ( $books as $key => $item ) {
            $rowIn = Carbon::parse( $item->in );
            $rowOut = Carbon::parse( $item->out );
            if( ( $in == $rowIn || ( $in > $rowIn && $in < $rowOut ) ) || ( $out == $rowOut || ( $out > $rowIn && $out < $rowOut ) ) ) {
                return [
                    'status' => 400,
                    'msg'    => 'Room are not available for these date'
                ];
            }
        }
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
            $books = Book::where( 'cuarto_id', '=', $request->cuarto_id )->get();
            $in = Carbon::parse( $request->in );
            $out = Carbon::parse( $request->out );
            //Valid dates
            foreach ( $books as $key => $item ) {
                $rowIn = Carbon::parse( $item->in );
                $rowOut = Carbon::parse( $item->out );
                if( ( $in == $rowIn || ( $in > $rowIn && $in < $rowOut ) ) || ( $out == $rowOut || ( $out > $rowIn && $out < $rowOut ) ) ) {
                    return [
                        'status' => 400,
                        'msg'    => 'Room are not available for these date'
                    ];
                }
            }
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
