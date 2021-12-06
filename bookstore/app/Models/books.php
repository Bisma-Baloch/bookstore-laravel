<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;
    public function author(){
       return $this->belongsTo(authors::class, 'author_id');
    }

    public function category(){
       return $this->belongsTo(categories::class, 'category_id');
    }

    public function order(){
       return $this->hasMany(orders_items::class);
    }

}
