<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders_items extends Model
{
    use HasFactory;
    public function book(){
        return $this->belongsTo(books::class);
    }
}
