<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OuroCombo extends Model
{
    use HasFactory;
    protected $fillable = [
    'name',
    'courses',
    'days'
];
}
