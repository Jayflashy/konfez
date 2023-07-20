<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'email',
        'description',
        'logo',
        'favicon',
        'facebook',
        'twitter',
        'whatsapp',
        'instagram',
        'primary_color',   
        'is_https',
        'is_analytics',
        'google_analytics_id',
        'is_adsense',
        'google_adsense',
        'meta_keywords',
        'meta_description',
        'is_maintenance',
        'maintenance_text',
        'is_cookies',
        'cookies_text',
        'facebook_pixel',
        'is_facebook_pixel',
    ];
}
