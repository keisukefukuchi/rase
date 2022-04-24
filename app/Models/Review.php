<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'shop_id',
        'score',
        'comment'
    ];

    public function score_percentage()
    {
        $score = $this->score;
        if (!empty($score)) {
            return $score * 20;
        }
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
}
