<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Comment extends Model
{
    protected $dates = ['published_at'];
    protected $fillable = [
        'content', 'user_id', 'post_id', 'published_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function getPublishDateAttribute($value)
    {
        return $this->published_at->format('M-j-Y');
    }

    public function getPublishTimeAttribute($value)
    {
        return $this->published_at->format('g:i A');
    }








}
