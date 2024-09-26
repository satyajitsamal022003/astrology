<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
	protected $table = 'category';
	protected $fillable = ['categoryName','image','banner','description','class','seoUrl','sortOrder','metaTitle','metaKeyword','metaDescription','metaImage','onTop','onFooter','status'];
}
