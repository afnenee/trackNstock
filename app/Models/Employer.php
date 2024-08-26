<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
  use HasFactory;
  protected $table = 'employer';

  protected $fillable = ['name', 'email', 'company', 'position', 'hired_at', 'address', 'phone_number'];

}
