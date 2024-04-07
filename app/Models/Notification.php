<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeCountNotification($query,$doctor_id){
        $query->where('user_id',$doctor_id)->where('reader_status',0);

    }
}
