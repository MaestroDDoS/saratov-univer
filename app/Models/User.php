<?php

namespace App\Models;

use App\Traits\FilterableModelTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, FilterableModelTrait;

    protected $fillable = [
        'name',
        'surname',
        'phone',
        'inn',
        'send_notifies',
        'permissions',
        'email',
        'password',
    ];

    protected $hidden = [
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    private $type = [

        false => 'user',
        true  => 'admin',

    ];

    //methods

    public function hasPermissions( $bitmask )
    {
        return  $this->permissions & $bitmask;
    }

    //attributes

    public function getIsAdminAttribute()
    {
        return  $this->permissions != 0;
    }

    public function getTypeAttribute()
    {
        return  $this->type[ $this->is_admin ];
    }

    // filters

    public function filter_name( Builder $builder, $value )
    {
        $builder->where('name', 'like', "%$value%");
    }

    public function filter_surname( Builder $builder, $value )
    {
        $builder->where('surname', 'like', "%$value%");
    }

    public function filter_email( Builder $builder, $value )
    {
        $builder->where('email', 'like', "%$value%");
    }

    public function filter_phone( Builder $builder, $value )
    {
        $builder->where('phone', 'like', "%$value%");
    }

    public function filter_is_admin( Builder $builder, $value )
    {
        $builder->where('permissions', '<>', "0");
    }
}
