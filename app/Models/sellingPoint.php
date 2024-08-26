<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sellingPoint extends Model
{
  use HasFactory;
  protected $table = 'selling_point';

  protected $fillable = ['name', 'description', 'location'];
}
