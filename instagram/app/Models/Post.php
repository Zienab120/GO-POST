<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
//        'user_id'
        'email',
        'name'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postCreator()
    {
        return $this->belongsTo(User::class, 'email');
    }
}
