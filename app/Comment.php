<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public $timestamps = false;

    protected $fillable = [
        'post_id',
        'comment',
    ];

    public function posts()
    {
        return $this->belongsTo('App\Post');
    }
}
