<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usermail extends Model
{
    use HasFactory;

    protected $table = 'mailers';
    protected $fillable = [
        'firstName', 'lastName', 'email', 'birth', 'contactNumber'
    ];

    public function getCreatedAtAttribute($created_at)
    {
        return Carbon::parse($created_at)->format('Y-M-d');
    }

    public function getBirthAttribute($birth)
    {
        return Carbon::parse($birth)->format('Y-m-d');
    }
}
