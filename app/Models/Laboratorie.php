<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorie extends Model
{
    use HasFactory;
    protected $fillable = ['description','description_employee','invoice_id','doctor_id','patient_id','employee_id','case'];
      /**
     * Get the doctor that owns the Ray
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
    public function employee()
    {
        return $this->belongsTo(LaboratorieEmployee::class, 'employee_id');
    }
    
}
