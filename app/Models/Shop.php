<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'genre_id',
        'area_id',
        'name',
        'description',
        'img_url',
    ];

    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }
    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
}
