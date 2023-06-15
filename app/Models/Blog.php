<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public $fillable = [
        'title',
        'image',
        'user_id',
        'description'
    ];

    public function getImageAttribute($value){
        return !empty(trim($value)) ?  public_path('image'.$value) : "";
    }

    public function blogger() {
        return $this->belongsTo(User::class,'user_id');
    }
}
