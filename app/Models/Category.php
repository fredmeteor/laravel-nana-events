<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Category extends Model
{
    use HasFactory,Sluggable;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function events() {
        return $this->hasMany('App\Event');
    }

    /**
     * Instance Methods
     *
     *
     */

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * NanaEvents uses route model binding for sanity and the
     * eloquent-sluggable package for pretty URLs, therefore we
     * need to override the ID column passed along via the URL.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function mostRecentEvent()
    {

        return $this->events()->orderBy('id', 'desc')->first();

    }
}
