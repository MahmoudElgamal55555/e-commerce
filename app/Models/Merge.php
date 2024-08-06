<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merge extends Model
{
    use HasFactory;
    protected $fillable = ['priority', 'from', 'package_name', 'merge', 'activity_status'];
}
