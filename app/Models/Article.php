<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'description',
        'location',
        'cover',
        'user_id',
    ];

    //relazione con category
    public function Category(){
        return $this->belongsTo(Category::class);
    }

    //relazione con user
    public function User(){
        return $this->belongsTo(User::class);
    }
}
