<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table = "quizzes";
    protected $fillable = ['name', 'description', 'main_photo', 'author_id', 'published'];
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
