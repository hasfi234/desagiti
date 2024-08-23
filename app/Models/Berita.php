<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'picture'];

    protected static function boot(){
        parent::boot();
        static::updating(function($model){
            if($model->isDirty('picture') && ($model->getOriginal('picture') !== null)){
                Storage::disk('public')->delete($model->getOriginal('picture'));
            }
        });

        static::creating(function ($post) {
            $post->slug = static::generateSlug($post->title);
        });

        // Automatically update the slug if the title changes when updating the post
        static::updating(function ($post) {
            if ($post->isDirty('title')) {
                $post->slug = static::generateSlug($post->title);
            }
        });
        
    }

    protected static function generateSlug($title)
    {
        $slug = Str::slug($title);
        $slugCount = static::where('slug', 'LIKE', "{$slug}%")->count();

        return $slugCount > 0 ? "{$slug}-{$slugCount}" : $slug;
    }
}
