<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    // Reservation.php
protected $fillable = ['name', 'email', 'date', 'time'];

}