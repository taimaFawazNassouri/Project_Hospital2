<?php

namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    use Translatable; // 2. To add translation methods
    protected $fillable= ['price','description','status'];

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['name'];
    use HasFactory;

}
