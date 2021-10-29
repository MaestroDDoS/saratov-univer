<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Enums\UserPermissions;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\BaseController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Validation\Rule;

class UsersController extends BaseController
{
    protected array $result_params     = [ 'id', 'name', 'surname', 'email', 'phone' ];
    protected array $stringable_params = [ 'name', 'surname', 'email', 'phone', 'is_admin' ];


    protected function create_array_results(): array
    {

        $query = User::filter($this->generate_query_params());

        $total = $query->toBase()->getCountForPagination();
        $items = $query->forPage($this->page_idx, $this->per_page)->get()->map( function( $item ) {

            return  [

                'id'        => $item->id,
                'name'      => $item->name,
                'surname'   => $item->surname,
                'email'     => $item->email,
                'phone'     => $item->phone,

            ];
        } );

        return ['data' => $items, 'count' => $total];
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

    protected function update_result($id): array
    {
        $user = User::where( "id", $id )->first();
        $data = request()->all();

        $validator = $this->validator( $user, $data );

        if( $validator->fails() )
        {
            return  [ 'status' => false, 'message' => $validator->messages() ];
        }

        if( isset( $data[ 'password' ] ) )
        {
            $data[ 'password' ] = Hash::make( $data[ 'password' ] );
        }

        $permissions = 0;

        if( $data[ "is_admin" ] ?? null )
        {
            foreach( UserPermissions::getKeys() as $key )
            {
                if( isset( $data[ $key ] ) )
                {
                    $permissions |= intval( $data[ $key ] ) * UserPermissions::getValue( $key );
                    unset( $data[ $key ] );
                }
            }
        }

        $user->update( $data + [ "permissions" => $permissions ] );
        return  [];
    }

    protected function delete_result($id): array
    {
        $user = User::where( "id", $id )->first();

        $user->delete();

        if( request()->user() != $user )
        {
            return [];
        }

        return  [ 'href' => route( 'common' ) ];
    }

    protected function create_singlepage_params($id)
    {
        return  [

            'user' => User::where( "id", $id )->first()

        ];
    }
}
