<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelEvents extends Model
{
    use HasFactory;
    protected $table = 'event';
    protected $guarded = [];
}
