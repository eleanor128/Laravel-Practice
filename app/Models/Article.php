<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    // public $timestamps = true;
    protected $fillable = ['title', 'content', 'image'];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromTimeString($value)->format('Y/m/d H:i');
        //  年月日 時分秒 H:24小時制 h:12小時制
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tag::class);
    }
}
