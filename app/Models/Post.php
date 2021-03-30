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
        'category_id',
    ];

    

    //Relación uno a muchos inversa

    public function users() {
        return $this->belongsToMany('App\Models\User');
    }

   
    // Relacion uno a uno inversa
    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    // Relacion uno a uno pilimorfica

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

}
