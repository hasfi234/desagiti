<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Potensi extends Model
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
    }
}
