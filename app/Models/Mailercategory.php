<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mailercategory extends Model
{
    use HasFactory;

    protected $table = 'mailer_categories';

    protected $fillable = [
        'title'
    ];

    public function mailer() {
        return $this->hasOne(Mailercategory::class, 'id');
    }

}
