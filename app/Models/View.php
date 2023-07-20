<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    public function postView()
    {
        return $this->belongsTo(Post::class);
    }
    
    //Create item views
    public static function createViewLog($post) {

        $views= new View();
        $views->post_id = $post->id;
        $views->user_id = (auth()->check())?auth()->id():null;
        $views->ip = request()->ip();
        $views->agent = request()->header('User-Agent');
        $views->save();
    }
    
}
