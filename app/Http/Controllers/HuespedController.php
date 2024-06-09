<?php

namespace App\Http\Controllers;

use App\Models\Huesped;
use Illuminate\Http\Request;

class HuespedController extends Controller
{

    public function index() {
        $data = Huesped::all();
        return [
            'status' => 200,
            'msg'    => 'Request successfully',
            'data'   => $data
        ];
    }

    public function find( int $id ){
        $row = Huesped::find( $id );
        return [
            'status' => 200,
            'msg'    => 'Request successfully',
            'data'   => $row
        ];
    }

    public function store( Request $request ){
        $request->validate([
            'name'      => 'required',
            'last_name' => 'required',
            'born_day'  => 'required',
            'email'     => 'required',
            'phone'     => 'required',
            'sex'       => 'required',
        ]);
        $row = Huesped::create( $request->all() );
        return [
            'status' => 201,
            'msg'    => 'Request successfully',
            'data'   => $row
        ];
    }

    public function update( Request $request, int $id ){
        $request->validate([
            'name'      => 'required',
            'last_name' => 'required',
            'born_day'  => 'required',
            'email'     => 'required',
            'phone'     => 'required',
            'sex'       => 'required',
        ]);
        $row = Huesped::find( $id );
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
        $row = Huesped::find( $id );
        if( $row !== null ){
            $row->delete();
        }

        return [
            'status' => 200,
            'msg'    => 'Request successfully'
        ];
    }


}
