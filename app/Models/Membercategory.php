<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membercategory extends Model
{
    use HasFactory;
    protected $table = 'membership_categories';
    protected $fillable = [
        'title', 'description', 'category_id'
    ];

    public function membership() {
        return $this->hasOne(Membercategory::class, 'id');
    }
}
