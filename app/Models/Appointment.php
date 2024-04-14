<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Appointment extends Model
{
    use HasFactory;
   // use Translatable; // 2. To add translation methods
   // 3. To define which attributes needs to be translated
    //public $translatedAttributes = ['name'];
    protected $fillable = ['name','email','phone','notes','section_id','doctor_id','type','appointment','appointment_patient'];


    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class ,'doctor_id');
    }

    
}
