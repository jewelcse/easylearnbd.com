<?php

namespace App;

use Conner\Tagging\Taggable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;



class Story extends Model
{

    use Taggable;
    use Sluggable;
    protected $fillable = [
        'title',
        'slug',
        'img_name',
        'body',
        'views_count',
    ];

    public function category(){

        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }



}
