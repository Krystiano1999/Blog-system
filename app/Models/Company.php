<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'website_url', 'logo'];

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'company_articles');
    }
}
