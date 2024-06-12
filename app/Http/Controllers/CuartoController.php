<?php

namespace App\Http\Controllers;

use App\Models\Cuarto;
use Illuminate\Http\Request;

class CuartoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api'/*, ['except' => [''] ]*/ );
    }

    public function index() {
        $data = Cuarto::all();
        foreach ( $data as $key => $item ) {
            $item->piso;
        }
        return [
            'status' => 200,
            'msg'    => 'Request successfully',
            'data'   => $data
        ];
    }

    public function find( int $id ){
        $row = Cuarto::find( $id );
        $row->piso;
        return [
            'status' => 200,
            'msg'    => 'Request successfully',
            'data'   => $row
        ];
    }

    public function store( Request $request ){
        $request->validate([
            'cuarto'  => 'required',
            'piso_id' => 'required',
        ]);
        $row = Cuarto::create( $request->all() );
        return [
            'status' => 201,
            'msg'    => 'Request successfully',
            'data'   => $row
        ];
    }

    public function update( Request $request, int $id  ){
        $request->validate([
            'cuarto'  => 'required',
            'piso_id' => 'required',
        ]);
        $row = Cuarto::find( $id );
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
        $row = Cuarto::find( $id );
        if( $row !== null ){
            $row->delete();
        }

        return [
            'status' => 200,
            'msg'    => 'Request successfully'
        ];
    }

}
