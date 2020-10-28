<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Book extends Model
{
  protected $fillable = ['title', 'description', 'author'];
}