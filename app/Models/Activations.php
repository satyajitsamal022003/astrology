<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activations extends Model
{
    use HasFactory;
    protected $table = 'activations';
	protected $fillable = ['amount'];
}
