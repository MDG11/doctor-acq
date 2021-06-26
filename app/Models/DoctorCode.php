<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorCode extends Model
{
    use HasFactory;
    public $fillable = [
        'code',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
