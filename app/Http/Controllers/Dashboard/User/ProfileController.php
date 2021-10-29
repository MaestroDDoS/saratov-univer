<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Http\Controllers\Basic\AjaxController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends AjaxController
{
    public function __construct()
    {
        $this->middleware( [ 'auth' ] );
    }

    protected function validator( $user, array $data )
    {
        return Validator::make( $data, [

            'name'      => ['required', 'string', 'min:2', 'max:32'],
            'surname'   => ['required', 'string', 'min:2', 'max:32'],

            'email'     => ['required', 'string', 'regex:/^[\S+]+\@[^s]+\.[^s]+$/', Rule::unique('users')->ignore($user->id)],
            'phone'     => ['required', 'string', 'regex:/^\+7[0-9]{10}$/'        , Rule::unique('users')->ignore($user->id)],

            'send_notifies' => ['required', 'boolean'],

            'password'         => ['nullable', 'string', 'regex:/^[a-zA-Z0-9!@#$%^&*]{5,32}$/' ],
            'password-confirm' => ['same:password'],

        ] );
    }

    protected function update( $user, array $data )
    {
        $result = [];
        $fields = [

            'name'      => $data['name'],
            'surname'   => $data['surname'],
            'email'     => $data['email'],
            'phone'     => $data['phone'],

            'send_notifies' => $data['send_notifies'],

        ];

        if( isset( $data[ 'password' ] ) )
        {
            $fields[ 'password' ] = Hash::make( $data[ 'password' ] );
        }

        if( $user->email != $data[ "email" ] )
        {
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();

            $result[ 'message' ] = trans( 'dashboard.email_changed' ) . " " . trans( 'auth.verify.email_check' );
        }

        $user->update( $fields );
        return  $result;

    }

    protected function ajax_result(): array
    {
        $request = request();
        $user    = $request->user();

        $data = $request->all();
        $validator = $this->validator( $user, $data );

        if( $validator->fails() )
            return  [ 'status' => false, 'message' => $validator->messages() ];

        return  $this->update( $request->user(), $data );
    }
}
