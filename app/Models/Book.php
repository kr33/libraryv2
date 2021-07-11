<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name','slug','name_sindhi','isbn_number','author','author_sindhi','translator','publisher','short_description','short_description_sindhi','year','language_id','category_id','book_attachment','book_attachment_url','book_thumbnail','book_thumbnail_url','status'];

    public function language(){
        return $this->belongsTo(Language::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this->hasMany(BookTag::class);
    }
}
