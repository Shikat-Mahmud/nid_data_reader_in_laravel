<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class NID extends Model
{
    use HasFactory;

    protected $fillable = ['nid_number', 'name', 'dob'];

}
