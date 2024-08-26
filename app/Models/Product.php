<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Product extends Model implements Auditable
{
  use HasFactory, \OwenIt\Auditing\Auditable;

  protected $fillable = [
    'image',
    'name',
    'barcode',
    'etats',
    'placement',
    'category',
    'agent',

  ];
  public $timestamps = true;

}
