<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;
    public function authors(){
        $this->belongsTo(authors::class);
    }

    public function category(){
        $this->belongsTo(categories::class);
    }

}
