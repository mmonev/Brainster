<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Database\Factories\VehicleFactory;

class Vehicle extends Model
{
    use SoftDeletes;
    use HasFactory;
 
    protected $fillable = [
        'brand', 'model', 'plate_number', 'insurance_date'
    ];
}
