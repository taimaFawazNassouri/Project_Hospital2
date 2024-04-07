<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Appointment extends Model
{
    use HasFactory;
    use Translatable; // 2. To add translation methods
    protected $fillable = ['name'];

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['name'];
}
