<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Doctor extends Authenticatable
{
    use HasFactory;
    use Translatable; // 2. To add translation methods
    protected $fillable= ['email','email_verified_at','password','phone','name','section_id','status'];

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['name','appointments'];


    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }

    public function doctorAppointments(){
        return $this->belongsToMany(Appointment::class,'appointment_doctor');

    }
   
}
