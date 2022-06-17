<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getContentLimitAttribute()
    {
        return substr($this->content, 0, 100);
    }

    public function getCreatedAttribute(){
        return $this->created_at->format('d/m/Y');
    }
}
