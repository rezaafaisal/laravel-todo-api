<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'title', 'description', 'is_starred', 'is_done', 'slug'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
}
