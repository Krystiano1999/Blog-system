<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'description', 'featured_image', 'webinar_date', 'webinar_url'];
}
