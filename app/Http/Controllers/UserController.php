<?php

namespace App\Http\Controllers;

use App\Helpers\Text;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {

    }

    public function find( int $id ){
        $row = User::find( $id );
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
            'email'     => 'required',
            'phone'     => 'required',
            'password'  => 'required',
            //'token'      => 'required',
            'rol'       => 'required',
        ]);
        //Valid unique email
        $row = User::where( 'email', '=', $request->email )->first();
        if( $row !== null ){
            return [
                'status' => 400,
                'msg'    => 'Email already registered'
            ];
        }
        $password = Hash::make( $request->password );
        $row = User::create([
            'name'      => $request->name,
            'last_name' => $request->last_name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => $password,
            'rol'       => $request->rol,
            'token'     => ''
        ]);
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
            'email'     => 'required',
            'phone'     => 'required',
            'rol'       => 'required',
        ]);
        //Valid unique email
        $row = User::find( $id );
        if( $row === null ){
            return [
                'status' => 400,
                'msg'    => 'Data not found'
            ];
        }

        $row->name      = $request->name;
        $row->last_name = $request->last_name;
        $row->email     = $request->email;
        $row->phone     = $request->phone;
        $row->rol       = $request->rol;
        if( $request->password !== '' ){
            $row->password = Hash::make( $request->password );
        }
        $row->save();
        return [
            'status' => 201,
            'msg'    => 'Request successfully',
            'data'   => $row
        ];
    }

    public function changePass( Request $request ){
        $request->validate([
            'email' => 'required',
        ]);
        $row = User::where( 'email', '=', $request->email )->first();
        if( $row === null ){
            return [
                'status' => 400,
                'msg'    => 'Data not found'
            ];
        }
        $row->password = Hash::make( $request->password );
        $row->save();
        return [
            'status' => 200,
            'msg'    => 'Request successfully'
        ];
    }

    public function forgetPass( Request $request ){
        $request->validate([
            'email'    => 'required',
            'password' => 'required'
        ]);
        $row = User::where( 'email', '=', $request->email )->first();
        if( $row === null ){
            return [
                'status' => 400,
                'msg'    => 'Data not found'
            ];
        }
        //Generate password
        $password = Text::generatePass();
        $row->password = Hash::make( $password );
        $row->save();
        //Send password
        return [
            'status'   => 200,
            'msg'      => 'Request succesfully',
            'data'     => $row,
            'password' => $password
        ];
    }

    public function destroy( int $id ){
        $row = User::find( $id );
        if( $row !== null ){
            $row->delete();
        }
        return [
            'status' => 200,
            'msg'    => 'Request successfully'
        ];
    }

}
