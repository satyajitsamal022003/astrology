<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couriertype extends Model
{
    use HasFactory;
    protected $table = 'couriertypes';
	protected $fillable = ['courier_name','courier_price','status'];
}
