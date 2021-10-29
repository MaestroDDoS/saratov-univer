<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    protected function guard()
    {
        return Auth::guard();
    }

    protected function validator( array $data )
    {
        return Validator::make( $data, [

            'name'      => ['required', 'string', 'min:2', 'max:32'],
            'surname'   => ['required', 'string', 'min:2', 'max:32'],

            'email'     => ['required', 'string', 'regex:/^[\S+]+\@[^s]+\.[^s]+$/', 'unique:users'],
            'phone'     => ['required', 'string', 'regex:/^\+7[0-9]{10}$/'        , 'unique:users'],

            'password'         => ['required', 'string', 'regex:/^[a-zA-Z0-9!@#$%^&*]{5,32}$/' ],
            'password-confirm' => ['same:password'],

        ] );
    }

    protected function create( array $data )
    {
        return User::create( [

            'name'      => $data['name'],
            'surname'   => $data['surname'],
            'email'     => $data['email'],
            'phone'     => $data['phone'],

            'password'  => Hash::make( $data['password'] ),

        ] );
    }

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('captcha');
    }

    public function __invoke( Request $request)
    {
        $data = $request->all();
        $validator = $this->validator( $data );

        if( $validator->fails() )
        {
            return new JsonResponse(['status' => false, 'message' => $validator->messages()]);
        }

        event( new Registered( $user = $this->create( $data ) ) );

        $this->guard()->login( $user, true );

        $request->session()->flash('flash_msg', trans( 'auth.success.register' ));

        return  new JsonResponse( [

            'status'  => true,
            'href'    => url()->previous(),

        ] );
    }
}
