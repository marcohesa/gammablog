<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';   
    }
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'description', 
        'publicationDate',
        'body',
        'status',
        'user_id',
        'category_id',
    ];

    

    //Relación uno a muchos inversa

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        $this->belongsTo(Category::class);
    }

    // Relacion uno a uno pilimorfica

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

}
