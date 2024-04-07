<?php

namespace App\Models;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;

class Section extends Model
{
    use Translatable; // 2. To add translation methods
    protected $fillable= ['name','description'];

    // 3. To define which attributes needs to be translated
    public $translatedAttributes = ['name','description'];
    use HasFactory;

    /**
     * The Doctor that belong to the Section
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function doctors(){
        return $this->hasMany(Doctor::class);
    }

}
