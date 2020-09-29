<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoryImage extends Model
{

    protected $fillable = [
        'img_name'
    ];

    public function user()
    {
        return $this->belongsTo('App\StoryImage');
    }
}
