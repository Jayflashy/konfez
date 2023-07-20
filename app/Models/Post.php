<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
    ];
    //User
    public function user()
    {
    return $this->belongsTo(User::class);
    }

    // Category
    public function category()
    {
    return $this->belongsTo(Category::class);
    }

    // Comments
    public function comment()
    {
        return $this->hasMany(Comment::class, 'post_id')->where('status', 1)->get();
    }

    // Comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    //Views
    public function postview() {
        return $this->hasMany(View::class)->count();
    }

    // Likes
    public function likes(){
        return $this->hasMany(Reaction::class)->count();
    }
    // trending
    public function trending(){
        return $this->hasMany(View::class, 'post_id');
    }
    

}
