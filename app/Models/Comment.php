<?php

namespace App\Models;

use App\Http\Controllers\PostController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $fillable = ['name','body',"post_id"];

    public function post()
    {
        return $this->belongsTo(Post::class);
        return $this->belongsTo(PostController::class);
    }
}
