<?php

namespace App\Http\Controllers;

use App\Models\Piso;
use Illuminate\Http\Request;

class PisoController extends Controller
{

    public function index() {
        $data = Piso::all();

        return [
            'status' => 200,
            'msg'    => 'Request successfully',
            'data'   => $data
        ];
    }

    public function find( int $id ) {
        $row = Piso::find( $id );
        return [
            'status' => 200,
            'msg'    => 'Request successfully',
            'data'   => $row
        ];
    }

    public function store( Request $request ){
        $request->validate([
            'piso' => 'required'
        ]);
        $row = Piso::create( $request->all() );
        return [
            'status' => 201,
            'msg'    => 'Request successfully',
            'data'   => $row
        ];
    }

    public function update( Request $request, int $id ){
        $request->validate([
            'piso' => 'required'
        ]);
        $row = Piso::find( $id );
        if( $row !== null ){
            $row->update( $request->all() );
        }

        return [
            'status' => 200,
            'msg'    => 'Request successfully',
            'data'   => $row
        ];

    }

    public function destroy( int $id ){
        $row = Piso::find( $id );
        if( $row !== null ){
            $row->delete();
        }

        return [
            'status' => 200,
            'msg'    => 'Request successfully'
        ];
    }

}
