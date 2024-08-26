<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
  use HasFactory;
  protected $dates = ['date', 'created_at', 'updated_at'];
  protected $table = 'inventory';

  protected $fillable = ['name', 'agent', 'product_id', 'date'];

  public $timestamps = true;
}
