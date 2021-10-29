<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [ 'name' ];

    // scopes

    public static string $payment_status = "pending-payment";

}































