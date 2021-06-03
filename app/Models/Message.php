<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $fillable = [
        'fromEmail', 'toEmail', 'contents', 'subject', 'fileUrl'
    ];

    public function getCreatedAtAttribute($created_at)
    {
        return Carbon::parse($created_at)->format('M-d-Y');
    }
}
